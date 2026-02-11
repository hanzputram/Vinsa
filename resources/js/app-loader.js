class AppLoaderController {
    constructor() {
        this.el = document.getElementById("app-loader");
        this.bar = document.getElementById("app-loader-bar");
        this.percent = document.getElementById("app-loader-percent");
        this.message = document.getElementById("app-loader-message");
        this.hint = document.getElementById("app-loader-hint");
        this.toggleBtn = document.getElementById("app-loader-toggle");

        this._visible = false;
        this._progress = 10;

        if (this.toggleBtn) {
            this.toggleBtn.addEventListener("click", () => {
                this.hint?.classList.toggle("hidden");
            });
        }
    }

    show(msg = "Loading…") {
        if (!this.el) return;
        this.setMessage(msg);
        this.el.classList.remove("hidden");
        this.el.classList.add("is-visible");
        this.el.setAttribute("aria-hidden", "false");
        this._visible = true;
    }

    hide() {
        if (!this.el) return;
        this.el.classList.remove("is-visible");
        this.el.classList.add("hidden");
        this.el.setAttribute("aria-hidden", "true");
        this._visible = false;
        // reset a bit (optional)
        this.setProgress(10);
    }

    setMessage(msg) {
        if (this.message) this.message.textContent = msg;
    }

    setProgress(value) {
        const v = Math.max(0, Math.min(100, Number(value)));
        this._progress = v;

        if (this.bar) this.bar.style.width = `${v}%`;
        if (this.percent) this.percent.textContent = `${Math.round(v)}%`;
    }

    // nice helper: animate progress toward target
    smoothTo(target = 90, step = 2, intervalMs = 120) {
        const t = Math.max(0, Math.min(100, Number(target)));
        const timer = setInterval(() => {
            if (!this._visible) return clearInterval(timer);
            if (this._progress >= t) return clearInterval(timer);
            this.setProgress(this._progress + step);
        }, intervalMs);
        return () => clearInterval(timer);
    }
}

export function bootAppLoader() {
    const loader = new AppLoaderController();

    // expose globally
    window.AppLoader = {
        show: (msg) => loader.show(msg),
        hide: () => loader.hide(),
        setProgress: (v) => loader.setProgress(v),
        setMessage: (msg) => loader.setMessage(msg),
        smoothTo: (t, step, ms) => loader.smoothTo(t, step, ms),
    };

    // Auto behavior:
    // 1) Show immediately (good for first paint)
    loader.show("Preparing…");
    loader.smoothTo(70, 3, 120);

    // 2) Hide when window fully loaded
    window.addEventListener("load", () => {
        loader.setProgress(100);
        loader.setMessage("Done");
        setTimeout(() => loader.hide(), 250);
    });

    // 3) Show on navigation away (full page reload)
    window.addEventListener("beforeunload", () => {
        loader.show("Loading page…");
        loader.setProgress(35);
    });

    // 4) Hook fetch() automatically (optional but useful)
    const originalFetch = window.fetch;
    window.fetch = async (...args) => {
        loader.show("Loading data…");
        const stop = loader.smoothTo(85, 2, 150);
        try {
            const res = await originalFetch(...args);
            loader.setProgress(100);
            return res;
        } finally {
            stop?.();
            setTimeout(() => loader.hide(), 220);
        }
    };

    return loader;
}
