<template>
    <div>
        <Head title="Maintenance" />

        <Heading class="mb-6">Maintenance</Heading>

        <Card
            class="flex flex-col items-center justify-center"
            style="min-height: 300px"
        >
            <div
                class="flex items-center justify-between w-full py-4 border-b border-gray-100"
            >
                <div class="flex justify-start ml-3">
                    <heading>Maintenance Mode </heading>
                </div>

                <div class="flex justify-end mr-3">
                    <label class="switch">
                        <input
                            v-model="config.currentlyInMaintenance"
                            @change="toggleMaintenanceMode"
                            class=""
                            width="100"
                            height="44"
                            speed="600"
                            type="checkbox"
                        />
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <transition name="fade">
                <div
                    v-if="config.currentlyInMaintenance"
                    class="flex flex-col items-center justify-center mb-6"
                >
                    <svg
                        class="w-16 h-16 mb-4 fill-current text-danger"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 640 512"
                    >
                        <path
                            d="M320 32C196.3 32 96 132.3 96 256c0 123.76 100.3 224 224 224s224-100.24 224-224c0-123.7-100.3-224-224-224zm0 400c-97.05 0-176-78.95-176-176S222.95 80 320 80s176 78.95 176 176-78.95 176-176 176zm0-112c-17.67 0-32 14.33-32 32s14.33 32 32 32 32-14.33 32-32-14.33-32-32-32zm22.32-192h-44.64c-9.47 0-16.86 8.17-15.92 17.59l12.8 128c.82 8.18 7.7 14.41 15.92 14.41h19.04c8.22 0 15.1-6.23 15.92-14.41l12.8-128c.94-9.42-6.45-17.59-15.92-17.59zM48 256c0-59.53 19.55-117.38 55.36-164.51 5.18-6.81 4.48-16.31-2.03-21.86l-12.2-10.41c-6.91-5.9-17.62-5.06-23.15 2.15C23.32 117.02 0 185.5 0 256c0 70.47 23.32 138.96 65.96 194.62 5.53 7.21 16.23 8.05 23.15 2.16l12.19-10.4c6.51-5.55 7.21-15.04 2.04-21.86C67.55 373.37 48 315.53 48 256zM572.73 59.71c-5.58-7.18-16.29-7.95-23.17-2l-12.15 10.51c-6.47 5.6-7.1 15.09-1.88 21.87C572.04 137.47 592 195.81 592 256c0 60.23-19.96 118.57-56.46 165.95-5.22 6.78-4.59 16.27 1.88 21.87l12.15 10.5c6.87 5.95 17.59 5.18 23.17-2C616.21 396.38 640 327.31 640 256c0-71.27-23.79-140.34-67.27-196.29z"
                        />
                    </svg>
                    <span>You are currently in Maintenance Mode</span>
                </div>
            </transition>

            <div v-if="!config.currentlyInMaintenance" class="w-full">
                <div
                    class="bg-white divide-y divide-gray-100 dark:bg-gray-800 dark:divide-gray-700"
                >
                    <div class="flex flex-col md:flex-row" index="0">
                        <div
                            class="w-full px-6 mt-2 md:px-8 md:mt-0 md:w-1/5 md:py-5"
                        >
                            <label
                                for="name-create-user-text-field"
                                class="inline-block pt-2 space-x-1 leading-tight"
                                ><span>Redirect</span></label
                            >
                        </div>
                        <div
                            class="w-full px-6 pb-5 mt-1 md:mt-0 md:px-8 md:w-3/5 md:py-5"
                        >
                            <div class="space-y-1">
                                <input
                                    v-model="config.redirect"
                                    type="text"
                                    name="redirect"
                                    class="w-1/2 form-control form-input form-input-bordered"
                                    placeholder="Redirect all requests to a specific URL"
                                /><br />
                                <span class="text-xs italic text-gray-500"
                                    >Redirect all requests to a specific
                                    URL.</span
                                >
                            </div>
                            <!----><!---->
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row" index="1">
                        <div
                            class="w-full px-6 mt-2 md:px-8 md:mt-0 md:w-1/5 md:py-5"
                        >
                            <label
                                for="email-create-user-text-field"
                                class="inline-block pt-2 space-x-1 leading-tight"
                                ><span>View</span>
                            </label>
                        </div>
                        <div
                            class="w-full px-6 pb-5 mt-1 md:mt-0 md:px-8 md:w-3/5 md:py-5"
                        >
                            <div class="space-y-1">
                                <input
                                    v-model="config.render"
                                    type="text"
                                    name="render"
                                    class="w-1/2 form-control form-input form-input-bordered"
                                    placeholder="Render a specific view"
                                /><br />
                                <span class="text-xs italic text-gray-500"
                                    >This view is rendered before any of your
                                    application's dependencies have
                                    loaded.</span
                                >
                            </div>
                            <!----><!---->
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row" index="2">
                        <div
                            class="w-full px-6 mt-2 md:px-8 md:mt-0 md:w-1/5 md:py-5"
                        >
                            <label
                                for="password-create-user-password-field"
                                class="inline-block pt-2 space-x-1 leading-tight"
                                ><span>Refresh</span></label
                            >
                        </div>
                        <div
                            class="w-full px-6 pb-5 mt-1 md:mt-0 md:px-8 md:w-3/5 md:py-5"
                        >
                            <input
                                v-model="config.refresh"
                                type="text"
                                name="refresh"
                                class="w-1/2 form-control form-input form-input-bordered"
                                placeholder="Refresh the application after a specific number of seconds"
                            /><br />
                            <span class="text-xs italic text-gray-500">
                                Instruct the browser to automatically refresh
                                the page after the specified number of seconds.
                            </span>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row" index="2">
                        <div
                            class="w-full px-6 mt-2 md:px-8 md:mt-0 md:w-1/5 md:py-5"
                        >
                            <label
                                for="password-create-user-password-field"
                                class="inline-block pt-2 space-x-1 leading-tight"
                                ><span>Secret</span></label
                            >
                        </div>
                        <div
                            class="w-full px-6 pb-5 mt-1 md:mt-0 md:px-8 md:w-3/5 md:py-5"
                        >
                            <input
                                v-model="config.secret"
                                type="text"
                                name="secret"
                                class="w-1/2 form-control form-input form-input-bordered"
                                placeholder="your-secret"
                            /><br />
                            <span class="text-xs italic text-gray-500"
                                >To allow maintenance mode to be bypassed using
                                a secret token.
                                https://example.com/view-website</span
                            >
                        </div>
                    </div>
                </div>
            </div>
        </Card>
    </div>
</template>

<script>
    export default {
        mounted() {
            Nova.request()
                .get("/nova-vendor/maintenance/status")
                .then((response) => {
                    this.statusMessage = "Data successfully loaded.";
                    this.config.currentlyInMaintenance =
                        response.data.currentlyInMaintenance;
                });
            Nova.request()
                .get("/nova-vendor/maintenance/config")
                .then((response) => {
                    this.config = response.data;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        data() {
            return {
                config: {
                    redirect: "",
                    render: "",
                    refresh: "",
                    secret: "",
                    retry: 60,
                    currentlyInMaintenance: null,
                },
            };
        },
        methods: {
            enableMaintenance() {
                let self = this;

                Nova.request()
                    .post("/nova-vendor/maintenance/down", {
                        message: "",
                        redirect: this.config.redirect,
                        render: this.config.render,
                        refresh: this.config.refresh,
                        secret: this.config.secret,
                        retry: this.config.retry,
                    })
                    .then((response) => {
                        self.config.currentlyInMaintenance = true;
                    });
            },
            disableMaintenance() {
                let self = this;
                Nova.request()
                    .post("/nova-vendor/maintenance/up")
                    .then((response) => {
                        self.config.currentlyInMaintenance = false;
                    });
            },
            toggleMaintenanceMode(e) {
                if (e.explicitOriginalTarget.checked) {
                    this.enableMaintenance();
                } else {
                    this.disableMaintenance();
                }
            },
        },
    };
</script>

<style>
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
        -webkit-transition: 0.4s;
        transition: 0.4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: 0.4s;
        transition: 0.4s;
    }

    input:checked + .slider {
        background-color: green;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px gren;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>
