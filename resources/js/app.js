import "./bootstrap";
import Swal from "sweetalert2/dist/sweetalert2.js";
import Alpine from "alpinejs";
import { bootAppLoader } from "./app-loader";

window.Alpine = Alpine;

bootAppLoader();
Alpine.start();
