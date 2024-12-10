@extends('layouts.admin')
@section('title','Налаштування')

@section('content')
    @include('admin.section.header')


    <div class="app-wrapper">

        <div class="app-content pt-3 p-md-3 p-lg-4">
            <div class="container-xl">
                <h1 class="app-page-title">Налаштування</h1>
                <hr class="mb-4">

                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-2">
                        <h3 class="section-title">Контакти</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                {{ html()->form('put')->route('admin.settings.update')->acceptsFiles()->open() }}
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Телефон</label>
                                    {{ html()->text('contact_phone',$contact_phone)->required()->attributes(['id'=>'contact_phone','class'=>'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Email</label>
                                    {{ html()->email('contact_email',$contact_email)->required()->attributes(['id'=>'contact_email','class'=>'form-control']) }}
                                </div>
                                <button type="submit" class="btn app-btn-primary">Зберегти</button>

                                {{ html()->form()->close() }}

                            </div>

                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-2">
                        <h3 class="section-title">Соціальні мережі</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                {{ html()->form('put')->route('admin.settings.update')->acceptsFiles()->open() }}

                                <div class="mb-3">
                                    <label for="contact_facebook" class="form-label">Facebook</label>
                                    {{ html()->text('contact_facebook',$contact_facebook)->attributes(['id'=>'contact_facebook','class'=>'form-control']) }}
                                </div>

                                <div class="mb-3">
                                    <label for="contact_twitter" class="form-label">Twitter</label>
                                    {{ html()->text('contact_twitter',$contact_twitter)->attributes(['id'=>'contact_twitter','class'=>'form-control']) }}
                                </div>

                                <div class="mb-3">
                                    <label for="contact_instagram" class="form-label">Instagram</label>
                                    {{ html()->text('contact_instagram',$contact_instagram)->attributes(['id'=>'contact_instagram','class'=>'form-control']) }}
                                </div>

                                <div class="mb-3">
                                    <label for="contact_youtube" class="form-label">Youtube</label>
                                    {{ html()->text('contact_youtube',$contact_youtube)->attributes(['id'=>'contact_youtube','class'=>'form-control']) }}
                                </div>

                                <div class="mb-3">
                                    <label for="contact_linkedin" class="form-label">Linkedin</label>
                                    {{ html()->text('contact_linkedin',$contact_linkedin)->attributes(['id'=>'contact_linkedin','class'=>'form-control']) }}
                                </div>
                                <button type="submit" class="btn app-btn-primary">Зберегти</button>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4 settings-section">
                    <div class="col-12 col-md-2">
                        <h3 class="section-title">Про нас</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                {{ html()->form('put')->route('admin.settings.update')->acceptsFiles()->open() }}

                                <div class="col-4 ">
                                    <div class="col-12">
                                        <div class="item-label mb-2"><strong>Зоображення</strong></div>
                                        <div class="item-data">
                                            <img class="profile-image" width="300" src="{{ $about_image??$no_image }}" id="image" alt="">
                                        </div>
                                    </div><!--//col-->
                                    <div class="col-12">
                                        <label for="about_image" class="drop-container">
                                            {{ html()->file('about_image')->accept('image/png, image/gif, image/jpeg')->attributes(array_merge(['id'=>'about_image','onchange'=>'loadFile(event)'],[is_null($about_image) ? 'required':''])) }}
                                            @error('icon')
                                            <p class="alert alert-message">{{ $message }}</p>
                                            @enderror
                                        </label>
                                    </div>
                                </div>

                                <div class="col-8 m-0 b-0">



                                    <div class="col-12 mb-3">
                                        <label for="about_title" class="form-label">Заголовок</label>
                                        {{ html()->text('about_title',$about_title)->attributes(['id'=>'about_title','class'=>'form-control']) }}
                                    </div>

                                    <div class="col-12 mb-3">
                                        <label for="about_description" class="form-label">Опис</label>
                                        {{ html()->textarea('about_description',$about_description)->attributes(['id'=>'about_description','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                    </div>

                                </div>




                                <button type="submit" class="btn app-btn-primary">Зберегти</button>
                                {{ html()->form()->close() }}
                            </div>

                        </div>
                    </div>
                </div>


                {{--                <hr class="my-4">
                                <div class="row g-4 settings-section">
                                    <div class="col-12 col-md-4">
                                        <h3 class="section-title">Plan</h3>
                                        <div class="section-intro">Settings section intro goes here. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <a href="help.html">Learn more</a></div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="app-card app-card-settings shadow-sm p-4">

                                            <div class="app-card-body">
                                                <div class="mb-2"><strong>Current Plan:</strong> Pro</div>
                                                <div class="mb-2"><strong>Status:</strong> <span class="badge bg-success">Active</span></div>
                                                <div class="mb-2"><strong>Expires:</strong> 2030-09-24</div>
                                                <div class="mb-4"><strong>Invoices:</strong> <a href="#">view</a></div>
                                                <div class="row justify-content-between">
                                                    <div class="col-auto">
                                                        <a class="btn app-btn-primary" href="#">Upgrade Plan</a>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a class="btn app-btn-secondary" href="#">Cancel Plan</a>
                                                    </div>
                                                </div>

                                            </div><!--//app-card-body-->

                                        </div><!--//app-card-->
                                    </div>
                                </div><!--//row-->
                                <hr class="my-4">
                                <div class="row g-4 settings-section">
                                    <div class="col-12 col-md-4">
                                        <h3 class="section-title">Data &amp; Privacy</h3>
                                        <div class="section-intro">Settings section intro goes here. Morbi vehicula, est eget fermentum ornare.</div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">
                                                <form class="settings-form">
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-1" checked>
                                                        <label class="form-check-label" for="settings-checkbox-1">
                                                            Keep user app activity history
                                                        </label>
                                                    </div><!--//form-check-->
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-2" checked>
                                                        <label class="form-check-label" for="settings-checkbox-2">
                                                            Keep user app preferences
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-3">
                                                        <label class="form-check-label" for="settings-checkbox-3">
                                                            Keep user app search history
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-4">
                                                        <label class="form-check-label" for="settings-checkbox-4">
                                                            Lorem ipsum dolor sit amet
                                                        </label>
                                                    </div>
                                                    <div class="form-check mb-3">
                                                        <input class="form-check-input" type="checkbox" value="" id="settings-checkbox-5">
                                                        <label class="form-check-label" for="settings-checkbox-5">
                                                            Aenean quis pharetra metus
                                                        </label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div><!--//app-card-body-->
                                        </div><!--//app-card-->
                                    </div>
                                </div><!--//row-->
                                <hr class="my-4">
                                <div class="row g-4 settings-section">
                                    <div class="col-12 col-md-4">
                                        <h3 class="section-title">Notifications</h3>
                                        <div class="section-intro">Settings section intro goes here. Duis velit massa, faucibus non hendrerit eget.</div>
                                    </div>
                                    <div class="col-12 col-md-8">
                                        <div class="app-card app-card-settings shadow-sm p-4">
                                            <div class="app-card-body">
                                                <form class="settings-form">
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="settings-switch-1" checked>
                                                        <label class="form-check-label" for="settings-switch-1">Project notifications</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="settings-switch-2">
                                                        <label class="form-check-label" for="settings-switch-2">Web browser push notifications</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="settings-switch-3" checked>
                                                        <label class="form-check-label" for="settings-switch-3">Mobile push notifications</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="settings-switch-4">
                                                        <label class="form-check-label" for="settings-switch-4">Lorem ipsum notifications</label>
                                                    </div>
                                                    <div class="form-check form-switch mb-3">
                                                        <input class="form-check-input" type="checkbox" id="settings-switch-5">
                                                        <label class="form-check-label" for="settings-switch-5">Lorem ipsum notifications</label>
                                                    </div>
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div><!--//app-card-body-->
                                        </div><!--//app-card-->
                                    </div>
                                </div><!--//row-->
                                <hr class="my-4">--}}
            </div><!--//container-fluid-->
        </div><!--//app-content-->

    </div><!--//app-wrapper-->
@endsection
@section('js')
    <script>
        var loadFile = function (event) {
            var output = document.getElementById('image');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function () {
                URL.revokeObjectURL(output.src) // free memory
            }
        };
    </script>
@endsection
@section('css')
    <style>
        .drop-container {
            display: block;
            width: 100%;
        }

        input[type=file] {
            width: 350px;
            max-width: 100%;
            color: #444;
            padding: 5px;
            background: #fff;
            border-radius: 10px;
            border: 1px solid #555;
        }

        input[type=file]::file-selector-button {
            margin-right: 20px;
            border: none;
            background: #084cdf;
            padding: 10px 20px;
            border-radius: 10px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        input[type=file]::file-selector-button:hover {
            background: #0d45a5;
        }
    </style>
@endsection
