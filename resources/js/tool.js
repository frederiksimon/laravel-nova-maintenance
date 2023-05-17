import Tool from "./pages/Tool";
import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();

Nova.booting((app, store) => {
    Nova.inertia("Maintenance", Tool);
});
