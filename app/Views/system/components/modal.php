<!-- Extra Large Modal -->
<div id="formModal" tabindex="-1" class="hidden justify-center fixed top-0 left-0 right-0 z-50 w-full px-4 py-10 items-center overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="backdrop-blur-sm fixed top-0 left-0 w-full h-full z-0" style="background-color: rgba(0, 26, 176, 0.15);"></div>
    <div class="relative w-full max-w-7xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-xl shadow">
            <!-- Modal header -->
            <div class="pt-3 pr-3 pl-16 pb-11 rounded-t-xl bg-hsm-white-2">
                <button type="button" class="p-1.5 ml-auto flex items-center justify-end" data-modal-hide="formModal">
                    <svg class="transition hover:brightness-90 rounded-3xl" width="28" height="28" viewBox="0 0 28 28" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path fill="#F9FAFF" d="M-1292-75H108v800h-1400z"/><circle fill="#EB0047" cx="14" cy="14" r="14"/><path d="M7.985 7.985c.7-.691 1.83-.691 2.462 0l3.494 3.503 3.562-3.503c.7-.691 1.83-.691 2.461 0 .759.7.759 1.83 0 2.462L16.53 13.94l3.435 3.562c.759.7.759 1.83 0 2.461-.632.759-1.762.759-2.46 0L13.94 16.53l-3.494 3.435c-.632.759-1.763.759-2.462 0-.691-.632-.691-1.762 0-2.46l3.503-3.563-3.503-3.494c-.691-.632-.691-1.763 0-2.462Z" stroke="#EB0047" fill="#FFF"/></g></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <h3 class="text-2xl font-bold text-hsm-black-1">
                    Nuevo documento
                </h3>
            </div>
            <!-- Modal body -->
            <form action="" method="post">
                <div class="pt-8 px-5 lg:px-16 space-y-6">
                    <div class="grid sm:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-5">
                        <!-- Campo de la ID Instrumento -->
                        <div>
                            <label for="id">
                                ID Instrumento
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="text"
                                    id="id"
                                    placeholder=""
                                    class="border-hsm-purple-1 hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                            </div>
                        </div>
                        <!-- Fin del campo de la ID Instrumento -->

                        <!-- Campo de la Tipo de documento -->
                        <div>
                            <label for="tipo">
                                Tipo de documento
                            </label>
                            <div class="relative pt-2">
                                <select
                                    class="border-hsm-purple-1 hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none  text-hsm-gray-1 appearance-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                    name="" id="tipo">
                                    <option selected disabled>Selecciona</option>
                                </select>
                                <div class="pointer-events-none absolute top-[1.15rem] right-1 flex items-center px-2 text-gray-700">
                                    <svg class="w-5 fill-hsm-purple-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M233.4 406.6c12.5 12.5 32.8 12.5 45.3 0l192-192c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L256 338.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l192 192z"/></svg>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del campo de la Tipo de documento -->

                        <!-- Campo de la Descripción -->
                        <div>
                            <label for="descripcion">
                                Descripción
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="text"
                                    id="descripcion"
                                    placeholder=""
                                    class="border-hsm-purple-1 hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                            </div>
                        </div>
                        <!-- Fin del campo de la Descripción -->
                    </div>

                    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-5">
                        <!-- Campo de la Certificado -->
                        <div>
                            <label for="certificado">
                                Certificado
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="text"
                                    id="certificado"
                                    placeholder=""
                                    class="border-hsm-purple-1 hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                            </div>
                        </div>
                        <!-- Fin del campo de la Certificado -->

                        <!-- Campo de la Fecha de Recepción -->
                        <div>
                            <label for="recepcion">
                                Fecha de Recepción
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="date"
                                    id="recepcion"
                                    placeholder="DD - MM - AAAA"
                                    class="border-hsm-purple-1 appearance-none hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                                <div class="pointer-events-none absolute top-[1.15rem] right-2 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 fill-hsm-purple-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/></svg>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del campo de la Fecha de Recepción -->

                        <!-- Campo de la Fecha de Calibración -->
                        <div>
                            <label for="calibracion">
                                Fecha de Calibración
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="date"
                                    id="calibracion"
                                    placeholder="DD - MM - AAAA"
                                    class="border-hsm-purple-1 appearance-none hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                                <div class="pointer-events-none absolute top-[1.15rem] right-2 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 fill-hsm-purple-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/></svg>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del campo de la Fecha de Calibración -->

                        <!-- Campo de la Fecha de Entrega -->
                        <div>
                            <label for="entrega">
                                Fecha de Entrega
                            </label>
                            <div class="relative pt-2">
                                <input
                                    type="date"
                                    id="entrega"
                                    placeholder="DD - MM - AAAA"
                                    class="border-hsm-purple-1 appearance-none hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"
                                >
                                <div class="pointer-events-none absolute top-[1.15rem] right-2 flex items-center px-2 text-gray-700">
                                    <svg class="w-4 fill-hsm-purple-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z"/></svg>
                                </div>
                            </div>
                        </div>
                        <!-- Fin del campo de la Fecha de Entrega -->
                    </div>

                    <div class="grid sm:grid-cols-2 gap-x-6 pt-3 gap-y-5">
                        <!-- Campo de la archivo -->
                        <div>
                            <label for="archivo">
                                Subir archivo
                            </label>
                            <div class="relative pt-2">
                                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-[8.6rem] border-[1px] border-hsm-purple-4 border-dashed rounded-md cursor-pointer bg-transparent">
                                    <div class="gap-y-3 flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg width="41" height="28" viewBox="0 0 41 28" xmlns="http://www.w3.org/2000/svg"><path d="M32.836 10.57C31.682 4.532 26.541 0 20.364 0 15.459 0 11.2 2.87 9.079 7.07 3.971 7.63 0 12.092 0 17.5 0 23.293 4.565 28 10.182 28h22.06c4.684 0 8.485-3.92 8.485-8.75 0-4.62-3.479-8.365-7.89-8.68Zm-9.078 5.18v7H16.97v-7h-5.091L20.364 7l8.484 8.75h-5.09Z" fill="#304FFE"/></svg>
                                        <p id="file-name-display" class="mb-2 text-sm">Arrastra y suelta aquí tu archivo <span class="font-semibold text-hsm-purple-4">o da clic aquí</span></p>
                                    </div>
                                    <input id="dropzone-file" type="file" class="hidden" />
                                </label>
                            </div>
                        </div>
                        <!-- Fin del campo de archivo -->

                        <!-- Campo de observaciones -->
                        <div>
                            <label for="observaciones">
                                Observaciones
                            </label>
                            <div class="relative pt-2">
                                <textarea rows="5" id="observaciones" class="resize-none border-hsm-purple-1 appearance-none hover:border-hsm-green-3 autofill:bg-none focus:ring-0 focus:outline-none px-4 py-2 border-[1px] rounded-xl w-full placeholder:text-sm placeholder:text-hsm-gray-1"></textarea>
                            </div>
                        </div>
                        <!-- Fin del campo de observaciones -->
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center justify-center lg:justify-end pt-4 px-16 pb-12 space-x-2 border-gray-200 rounded-b">
                    <button class="bg-hsm-purple-4 px-4 py-3 rounded-lg text-white font-semibold">Guardar documento</button>
                </div>
            </form>
        </div>
    </div>
</div>
