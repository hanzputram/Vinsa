<x-app-layout>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="p-6 md:p-10">
        <div class="max-w-5xl mx-auto">
            
            <!-- Error Messages -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-100 rounded-2xl animate-in fade-in duration-300">
                    <div class="flex items-center gap-3 text-rose-600 font-bold mb-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        Please correct the following errors:
                    </div>
                    <ul class="list-disc list-inside text-sm text-rose-500 font-medium space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Page Header -->
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-10">
                <div>
                    <h1 class="text-3xl font-black text-slate-900 tracking-tight">Edit Product</h1>
                    <p class="text-slate-500 font-medium">Updating details for <span class="text-[#066c5f]">#{{ $product->kode }}</span></p>
                </div>
                <div class="flex items-center gap-4">
                    <form id="delete-product-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="delete-product-btn px-6 py-2.5 bg-rose-50 text-rose-600 rounded-xl font-bold text-sm hover:bg-rose-600 hover:text-white transition-all border border-rose-100" data-id="{{ $product->id }}">
                            Delete Product
                        </button>
                    </form>
                    <a href="{{ route('products.edit') }}" class="group inline-flex items-center gap-2 text-slate-500 hover:text-[#066c5f] font-bold transition-all">
                        <svg class="w-5 h-5 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                        Back
                    </a>
                </div>
            </div>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                @csrf
                @method('PUT')
                
                <!-- Main Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                    
                    <!-- Left Column: Primary Info -->
                    <div class="lg:col-span-2 space-y-6">
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h2 class="text-xl font-black text-slate-900 flex items-center gap-3">
                                <span class="w-8 h-8 bg-[#066c5f]/10 text-[#066c5f] rounded-lg flex items-center justify-center text-sm font-bold">01</span>
                                General Information
                            </h2>

                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div class="space-y-2">
                                        <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Product Name</label>
                                        <input type="text" name="name" required value="{{ old('name', $product->name) }}"
                                            class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold"
                                            placeholder="e.g. MCB Schneider iC60H">
                                    </div>
                                    <div class="space-y-2">
                                        <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Product Code</label>
                                        <input type="text" name="kode" required value="{{ old('kode', $product->kode) }}"
                                            class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold uppercase"
                                            placeholder="e.g. VHB-200">
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Description</label>
                                    <textarea name="description" rows="5"
                                        class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold"
                                        placeholder="Detailed description of the product...">{{ old('description', $product->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Specifications Section -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-black text-slate-900 flex items-center gap-3">
                                    <span class="w-8 h-8 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center text-sm font-bold">02</span>
                                    Specifications
                                </h2>
                                <button type="button" onclick="addSpecification()" class="px-4 py-2 bg-emerald-50 text-emerald-600 rounded-xl font-bold text-xs uppercase tracking-widest hover:bg-emerald-600 hover:text-white transition-all">Add Field</button>
                            </div>

                            <div id="specifications" class="space-y-3">
                                @foreach ($product->attributes as $index => $attribute)
                                    <div class="flex gap-3 spec-row animate-in fade-in slide-in-from-top-2 duration-300">
                                        <input type="text" name="specifications[{{ $index }}][field_name]" placeholder="Property"
                                            value="{{ old("specifications.$index.field_name", $attribute->field_name) }}"
                                            class="w-1/2 px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-emerald-500 font-semibold">
                                        <input type="text" name="specifications[{{ $index }}][field_value]" placeholder="Value"
                                            value="{{ old("specifications.$index.field_value", $attribute->field_value) }}"
                                            class="w-1/2 px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-emerald-500 font-semibold">
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- SEO Metadata -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h2 class="text-xl font-black text-slate-900 flex items-center gap-3">
                                <span class="w-8 h-8 bg-[#F77F1E]/10 text-[#F77F1E] rounded-lg flex items-center justify-center text-sm font-bold">03</span>
                                SEO Optimization
                            </h2>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <div class="flex justify-between items-end pl-1">
                                        <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Meta Title</label>
                                        <span class="text-[10px] font-black text-slate-400 tracking-widest uppercase"><span id="meta_title_count">0</span> / 255</span>
                                    </div>
                                    <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $product->meta_title ?? '') }}"
                                        class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#F77F1E] font-semibold"
                                        maxlength="255" placeholder="MCB Schneider iC60H | Buy at Vinsa Electric">
                                </div>

                                <div class="space-y-2">
                                    <div class="flex justify-between items-end pl-1">
                                        <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Meta Description</label>
                                        <span class="text-[10px] font-black text-slate-400 tracking-widest uppercase"><span id="meta_desc_count">0</span> / 500</span>
                                    </div>
                                    <textarea name="meta_description" id="meta_description" rows="4"
                                        class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#F77F1E] font-semibold"
                                        maxlength="500" placeholder="Meta description for search engine results...">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Column: Media & Category -->
                    <div class="space-y-6">
                        <!-- Category Section -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h2 class="text-xl font-black text-slate-900">Classification</h2>
                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <label class="block text-xs font-black text-slate-500 uppercase tracking-widest pl-1">Category</label>
                                    <select name="category_id" id="categorySelect" required 
                                            class="w-full px-5 py-3 bg-slate-100 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold appearance-none">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }} data-name="{{ strtolower($category->name) }}">
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="custom_input" id="custom_input" value="{{ old('custom_input', $product->custom_input ?? '') }}">
                                <div id="category-extra" class="space-y-4 animate-in fade-in duration-300"></div>
                            </div>
                        </div>

                        <!-- Media Section -->
                        <div class="bg-white rounded-[2rem] p-8 border border-slate-200 shadow-sm space-y-6">
                            <h2 class="text-xl font-black text-slate-900">Media Assets</h2>
                            
                            <div class="space-y-6">
                                <div class="space-y-4">
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest pl-1">Update Image</label>
                                    <div class="relative group aspect-[8/11] bg-slate-100 rounded-[2rem] overflow-hidden border-2 border-dashed border-slate-200 flex flex-col items-center justify-center p-4">
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="Current" class="absolute inset-0 w-full h-full object-cover opacity-60 group-hover:scale-110 transition-transform duration-500">
                                        <div class="relative z-10 bg-white/80 backdrop-blur-md p-4 rounded-2xl shadow-xl flex flex-col items-center gap-2">
                                            <svg class="w-8 h-8 text-[#066c5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                                            <span class="text-[10px] font-black text-slate-900 uppercase tracking-widest">Change Photo</span>
                                        </div>
                                        <input type="file" name="image" class="absolute inset-0 opacity-0 cursor-pointer">
                                    </div>
                                    <p class="text-[10px] font-black text-rose-500 uppercase tracking-widest">* Ratio 8:11 Only</p>
                                </div>

                                <div class="border-t border-slate-100 pt-6 space-y-4">
                                    <label class="block text-xs font-bold text-slate-500 uppercase tracking-widest pl-1">Update Datasheet</label>
                                    
                                    <div class="space-y-4">
                                        <div class="space-y-2">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Option A: Upload PDF</p>
                                            <input type="file" name="datasheet" accept="application/pdf"
                                                class="block w-full text-xs text-slate-500 
                                                file:mr-4 file:py-2 file:px-4 
                                                file:rounded-xl file:border-0 
                                                file:text-[10px] file:font-bold file:uppercase file:tracking-widest
                                                file:bg-slate-900 file:text-white 
                                                hover:file:bg-slate-800
                                                cursor-pointer">
                                        </div>
                                        <div class="space-y-2">
                                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Option B: External Link</p>
                                            <input type="url" name="datasheet_link" value="{{ old('datasheet_link', (filter_var($product->datasheet, FILTER_VALIDATE_URL) ? $product->datasheet : '')) }}"
                                                placeholder="https://example.com/spec.pdf"
                                                class="w-full px-4 py-2.5 bg-slate-50 border-0 rounded-xl focus:ring-2 focus:ring-slate-900 text-xs font-bold">
                                        </div>
                                    </div>

                                    @if($product->datasheet)
                                        <a href="{{ filter_var($product->datasheet, FILTER_VALIDATE_URL) ? $product->datasheet : asset('storage/' . $product->datasheet) }}" target="_blank"
                                           class="mt-4 flex items-center gap-3 p-4 bg-emerald-50 rounded-2xl border border-emerald-100 group hover:bg-emerald-600 transition-all duration-300">
                                            <svg class="w-8 h-8 text-emerald-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                            <div>
                                                <p class="text-[10px] font-black text-emerald-600 group-hover:text-emerald-100 uppercase tracking-widest mb-1">Current File</p>
                                                <p class="text-xs font-bold text-slate-900 group-hover:text-white truncate max-w-[150px]">{{ basename($product->datasheet) }}</p>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Action Section -->
                        <div class="bg-slate-900 rounded-[2rem] p-8 shadow-2xl shadow-slate-200">
                             <button type="submit"
                                class="w-full py-4 bg-[#066c5f] text-white rounded-2xl font-black uppercase tracking-[0.2em] shadow-lg shadow-[#066c5f]/30 hover:bg-[#F77F1E] hover:text-white transition-all duration-300 flex items-center justify-center gap-3">
                                Save Changes
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        let specCount = {{ count($product->attributes) }};

        function addSpecification() {
            let div = document.createElement('div');
            div.classList.add('flex', 'gap-3', 'spec-row', 'animate-in', 'fade-in', 'slide-in-from-top-2', 'duration-300');
            div.innerHTML = `
                <input type="text" name="specifications[${specCount}][field_name]" placeholder="Property" class="w-1/2 px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-emerald-500 font-semibold">
                <input type="text" name="specifications[${specCount}][field_value]" placeholder="Value" class="w-1/2 px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-emerald-500 font-semibold">
            `;
            document.getElementById('specifications').appendChild(div);
            specCount++;
        }

        function updatePushButtonValue(tipe = null, series = null) {
            const hidden = document.getElementById('custom_input');
            let current = {};
            try { current = JSON.parse(hidden.value || '{}'); } catch {}
            if (tipe !== null) current.tipe = tipe;
            if (series !== null) current.series = series;
            hidden.value = JSON.stringify(current);
        }

        document.addEventListener("DOMContentLoaded", function() {
            // Meta character counter logic
            const metaTitle = document.getElementById('meta_title');
            const metaTitleCount = document.getElementById('meta_title_count');
            const metaDesc = document.getElementById('meta_description');
            const metaDescCount = document.getElementById('meta_desc_count');

            if (metaTitle && metaTitleCount) {
                const updateMetaTitle = () => {
                    metaTitleCount.textContent = metaTitle.value.length;
                    metaTitleCount.classList.toggle('text-[#066c5f]', metaTitle.value.length >= 50 && metaTitle.value.length <= 60);
                };
                metaTitle.addEventListener('input', updateMetaTitle);
                updateMetaTitle();
            }

            if (metaDesc && metaDescCount) {
                const updateMetaDesc = () => {
                    metaDescCount.textContent = metaDesc.value.length;
                    metaDescCount.classList.toggle('text-[#066c5f]', metaDesc.value.length >= 140 && metaDesc.value.length <= 155);
                };
                metaDesc.addEventListener('input', updateMetaDesc);
                updateMetaDesc();
            }

            const categorySelect = document.getElementById('categorySelect');
            const extraContainer = document.getElementById('category-extra');
            const customInputHidden = document.getElementById('custom_input');
            const oldCategory = categorySelect.options[categorySelect.selectedIndex]?.dataset?.name;
            let oldValue = customInputHidden.value;
            let parsedOld = {};
            try { parsedOld = JSON.parse(oldValue); } catch {}

            function renderExtraFields(category) {
                extraContainer.innerHTML = '';
                const fieldWrap = (label, input) => `
                    <div class="space-y-2 animate-in fade-in slide-in-from-top-2">
                        <label class="block text-[10px] font-black text-slate-400 uppercase tracking-widest pl-1">${label}</label>
                        ${input}
                    </div>
                `;

                if (category === 'cable tray') {
                    const selected = oldValue === 'U Series' ? 'U Series' : (oldValue === 'C Series' ? 'C Series' : '');
                    extraContainer.innerHTML = fieldWrap('U & C Series', `
                        <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold"
                            onchange="document.getElementById('custom_input').value = this.value;">
                            <option value="">Pilih Series</option>
                            <option value="U Series" ${selected === 'U Series' ? 'selected' : ''}>U Series</option>
                            <option value="C Series" ${selected === 'C Series' ? 'selected' : ''}>C Series</option>
                        </select>
                    `);
                    customInputHidden.value = selected;
                } else if (category.includes('push button') || category.includes('selector switch')) {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    extraContainer.innerHTML = 
                        fieldWrap('Type', `<input type="text" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold" value="${tipe}" oninput="updatePushButtonValue(this.value, null)">`) +
                        fieldWrap('Series', `
                            <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                                <option value="">Pilih Series</option>
                                <option value="KB 5 Series" ${series === 'KB 5 Series' ? 'selected' : ''}>KB 5 Series</option>
                                <option value="KB 2 Series" ${series === 'KB 2 Series' ? 'selected' : ''}>KB 2 Series</option>
                            </select>
                        `);
                } else if (category === 'mccb') {
                    const series = parsedOld.series || '';
                    const options = ['M12B 25kA', 'M16F 35kA', 'M25F 35kA', 'M40F 35kA', 'M63F 35kA', 'M80F 35kA'];
                    extraContainer.innerHTML = fieldWrap('Series', `
                        <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            ${options.map(opt => `<option value="${opt}" ${series === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                        </select>
                    `);
                } else if (category === 'terminal block') {
                    const series = parsedOld.series || '';
                    const options = ['Terminal Strip', 'Terminal Block TB', 'Terminal Block TBC', 'Terminal Block TBR', 'Terminal Block TUK', 'Terminal Block TUSLKG', 'Terminal Block KLUS'];
                    extraContainer.innerHTML = fieldWrap('Series', `
                        <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                            <option value="">Pilih Series</option>
                            ${options.map(opt => `<option value="${opt}" ${series === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                        </select>
                    `);
                } else if (category === 'cable lug') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    const options = ['SC Cable Lug', 'SV Cable Lug', 'RV Cable Lug', 'PTV Cable Lug', 'DBV Cable Lug'];
                    extraContainer.innerHTML = 
                        fieldWrap('Type', `<input type="text" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold" value="${tipe}" oninput="updatePushButtonValue(this.value, null)">`) +
                        fieldWrap('Series', `
                            <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                                <option value="">Pilih Series</option>
                                ${options.map(opt => `<option value="${opt}" ${series === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                            </select>
                        `);
                } else if (category === 'mccb accessories') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    const options = ['MAA Alarm Contact', 'MAS Shunt Release', 'MAAUX Auxiliary Contact', 'MAUVT Under Voltage', 'MARH Extended Rotary Handle'];
                    extraContainer.innerHTML = 
                        fieldWrap('Type', `<input type="text" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold" value="${tipe}" oninput="updatePushButtonValue(this.value, null)">`) +
                        fieldWrap('Series', `
                            <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                                <option value="">Pilih Series</option>
                                ${options.map(opt => `<option value="${opt}" ${series === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                            </select>
                        `);
                } else if (category === 'contactor accessories') {
                    const tipe = parsedOld.tipe || '';
                    const series = parsedOld.series || '';
                    const options = ['Coil Contactor', 'Auxiliary Contact', 'Time Delay', 'Thermal Overload relay'];
                    extraContainer.innerHTML = 
                        fieldWrap('Type', `<input type="text" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold" value="${tipe}" oninput="updatePushButtonValue(this.value, null)">`) +
                        fieldWrap('Series', `
                            <select class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-bold" onchange="updatePushButtonValue(null, this.value)">
                                <option value="">Pilih Series</option>
                                ${options.map(opt => `<option value="${opt}" ${series === opt ? 'selected' : ''}>${opt}</option>`).join('')}
                            </select>
                        `);
                } else if (['pilot lamp', 'accessories'].includes(category)) {
                    const typedValue = parsedOld.tipe || (typeof oldValue === 'string' && !oldValue.startsWith('{') ? oldValue : '');
                    extraContainer.innerHTML = fieldWrap('Type', `<input type="text" class="w-full px-5 py-3 bg-slate-50 border-0 rounded-2xl focus:ring-2 focus:ring-[#066c5f] font-semibold" value="${typedValue}" oninput="document.getElementById('custom_input').value = this.value">`);
                    if (!customInputHidden.value || customInputHidden.value.startsWith('{')) {
                        customInputHidden.value = typedValue;
                    }
                }
            }

            if (oldCategory) renderExtraFields(oldCategory);
            categorySelect.addEventListener('change', function() { renderExtraFields(this.options[this.selectedIndex].dataset.name); });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.delete-product-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const form = document.getElementById(`delete-product-form-${id}`);
                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This removal is permanent!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#e11d48',
                        cancelButtonColor: '#64748b',
                        confirmButtonText: 'Yes, delete it!',
                        customClass: {
                            popup: 'rounded-[2.5rem]',
                            confirmButton: 'rounded-xl font-bold px-8 py-3',
                            cancelButton: 'rounded-xl font-bold px-8 py-3'
                        }
                    }).then((result) => { if (result.isConfirmed) form.submit(); });
                });
            });
        });
    </script>
</x-app-layout>
