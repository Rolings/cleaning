<!-- Modal -->
<div class="modal fade" id="orderShow" tabindex="-1" aria-labelledby="orderShowLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
                    <div class="app-card-header p-3 border-bottom-0">
                        <div class="row align-items-center gx-3">
                            <div class="col-auto">
                                <div class="app-icon-holder">
                                    <svg xmlns="http://www.w3.org/2000/svg"  width="1em" height="1em"  fill="currentColor" class="bi bi-cart-check" viewBox="0 0 16 16">
                                        <path d="M11.354 6.354a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
                                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1zm3.915 10L3.102 4h10.796l-1.313 7zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0m7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0"/>
                                    </svg>
                                </div><!--//icon-holder-->
                            </div><!--//col-->
                            <div class="col-auto">
                                <h4 class="app-card-title">Замовлення </h4>
                                <h5>#<span class="order-data-id"></span></h5>
                            </div><!--//col-->
                        </div><!--//row-->
                    </div><!--//app-card-header-->
                    <div class="app-card-body px-4 w-100">

                        <div class="row">
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Дата створення</strong></div>
                                        <div class="item-data order-data-time"></div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//Created date-->
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Дата виконання замовлення</strong></div>
                                        <h3><span class="item-data order-data-time-checkout badge bg-primary"></span></h3>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//Order date-->
                        </div>

                        <div class="row">
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Имя </strong></div>
                                        <div class="item-data order-data-name"></div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//Name-->

                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Адреса</strong></div>
                                        <div class="item-data">
                                            <span class="order-data-address"></span>
                                        </div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <span class="btn-sm app-btn-secondary copy p-2 cursor-pointer" data-copy-field="order-data-address"><svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg></span>
                                    </div>
                                </div><!--//row-->
                            </div><!--//Address-->
                        </div>
                        <div class="row">
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Телефон</strong></div>
                                        <div class="item-data">
                                            <span class="order-data-phone"></span>
                                        </div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <span class="btn-sm app-btn-secondary copy p-2 cursor-pointer" data-copy-field="order-data-phone"><svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg></span>
                                    </div>
                                </div><!--//row-->
                            </div><!--//Phone-->
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Пропозиція</strong></div>
                                        <div class="item-data">
                                            <span class="order-data-offer-name"></span>
                                        </div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//Offer-->
                        </div>

                        <div class="row">
                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-auto">
                                        <div class="item-label"><strong>Email</strong></div>
                                        <div class="item-data">
                                            <span class="order-data-email"></span>
                                        </div>
                                    </div><!--//col-->
                                    <div class="col text-end">
                                        <span class="btn-sm app-btn-secondary copy p-2 cursor-pointer" data-copy-field="order-data-email"><svg xmlns="http://www.w3.org/2000/svg" width="15" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M384 336l-192 0c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l140.1 0L400 115.9 400 320c0 8.8-7.2 16-16 16zM192 384l192 0c35.3 0 64-28.7 64-64l0-204.1c0-12.7-5.1-24.9-14.1-33.9L366.1 14.1c-9-9-21.2-14.1-33.9-14.1L192 0c-35.3 0-64 28.7-64 64l0 256c0 35.3 28.7 64 64 64zM64 128c-35.3 0-64 28.7-64 64L0 448c0 35.3 28.7 64 64 64l192 0c35.3 0 64-28.7 64-64l0-32-48 0 0 32c0 8.8-7.2 16-16 16L64 464c-8.8 0-16-7.2-16-16l0-256c0-8.8 7.2-16 16-16l32 0 0-48-32 0z"/></svg></span>
                                    </div>
                                </div><!--//row-->
                            </div><!--//Email-->

                            <div class="col-6 item border-bottom py-3">
                                <div class="row justify-content-between align-items-center">
                                    <div class="col-12">
                                        <div class="item-label"><strong>Сервіси</strong></div>
                                        <div class="js-services-list"></div>
                                    </div><!--//col-->
                                    <div class="col-12 mt-2">
                                        <div class="item-label"><strong>Додаткові сервіси</strong></div>
                                        <div class="js-additional-services-list"></div>
                                    </div><!--//col-->
                                </div><!--//row-->
                            </div><!--//Email-->



                        </div>




                    </div><!--//app-card-body-->

                </div>
            </div>

        </div>
    </div>
</div>
