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
                                    <label for="contact_address" class="form-label">Адреса</label>
                                    {{ html()->text('contact_address',$contact_address)->attributes(['id'=>'contact_address','class'=>'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    <label for="contact_phone" class="form-label">Телефон</label>
                                    {{ html()->text('contact_phone',$contact_phone)->attributes(['id'=>'contact_phone','class'=>'form-control']) }}
                                </div>
                                <div class="mb-3">
                                    <label for="contact_email" class="form-label">Email</label>
                                    {{ html()->email('contact_email',$contact_email)->attributes(['id'=>'contact_email','class'=>'form-control']) }}
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
                        <h3 class="section-title">Відсотки</h3>
                    </div>
                    <div class="col-12 col-md-10">
                        <div class="app-card app-card-settings shadow-sm p-4">
                            <div class="app-card-body">
                                {{ html()->form('put')->route('admin.settings.update')->acceptsFiles()->open() }}

                                <div class="mb-3">
                                    <label for="discount_percentage" class="form-label">Відсоток знижки</label>
                                    {{ html()->number('discount_percentage',$discount_percentage)->placeholder('0.00')->attributes(['id'=>'discount_percentage','class'=>'form-control','step'=>'0.01','min'=>0,'max'=>100]) }}
                                </div>

                                <div class="mb-3">
                                    <label for="tax_percentage" class="form-label">Відсоток податку</label>
                                    {{ html()->number('tax_percentage',$tax_percentage)->placeholder('0.00')->attributes(['id'=>'tax_percentage','class'=>'form-control','step'=>'0.01','min'=>0,'max'=>100]) }}
                                </div>

                                <button type="submit" class="btn app-btn-primary">Зберегти</button>
                                {{ html()->form()->close() }}
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="my-4">
                <div class="row g-4 settings-section ">
                    <div class="col-12 col-lg-2">
                        <h3 class="section-title">Про нас</h3>
                    </div>
                    <div class="col-12 col-lg-10 app-card shadow-sm">
                        <div class="row gy-4">
                            {{ html()->form('put')->route('admin.settings.update')->attributes(['class'=>'row gy-4'])->acceptsFiles()->open() }}
                            <div class="col-12 col-lg-4">

                                <div class="app-card-account  d-flex flex-column align-items-start">
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item app-card-settings py-3">
                                            <div class="row justify-content-between align-items-center">

                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="item-label mb-2"><strong>Зоображення</strong></div>
                                                        <div class="item-data">
                                                            <img class="about-image" width="300" src="{{ $about_image??$no_image }}"
                                                                 id="image" alt="">
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

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-8">

                                <div class="app-card-account d-flex flex-column align-items-start">
                                    <div class="app-card-body px-4 w-100">
                                        <div class="item app-card-settings py-3">
                                            <div class="row justify-content-between align-items-center">

                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label for="about_title" class="form-label">Заголовок</label>
                                                        {{ html()->text('about_title',$about_title)->attributes(['id'=>'about_title','class'=>'form-control']) }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label for="about_preview_description" class="form-label">Короткий опис</label>
                                                        {{ html()->textarea('about_preview_description',$about_preview_description??null)->attributes(['id'=>'about_preview_description','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 mb-3">
                                                        <label for="about_description" class="form-label">Опис</label>
                                                        {{ html()->textarea('about_description',$about_description)->attributes(['id'=>'about_description','class'=>'form-control textarea textarea-editor','cols'=>'100','rows'=>'30','style'=>'height:300px;']) }}
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="btn app-btn-primary">Зберегти</button>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
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
