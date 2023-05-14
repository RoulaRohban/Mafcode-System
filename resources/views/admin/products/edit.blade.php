<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('products.edit'))
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css"/>
    <style>
        .gallery-block {
            padding-bottom: 60px;
            padding-top: 30px;
        }

        .gallery-block .heading {
            margin-bottom: 50px;
            text-align: center;
        }

        .gallery-block .heading h2 {
            font-weight: bold;
            font-size: 1.4rem;
            text-transform: uppercase;
        }

        .gallery-block.compact-gallery .item {
            overflow: hidden;
            margin-bottom: 0;
            background: black;
            opacity: 1;
        }

        .gallery-block.compact-gallery .item .image {
            transition: 0.8s ease;
        }

        .gallery-block.compact-gallery .item .info {
            position: relative;
            display: inline-block;
        }

        .gallery-block.compact-gallery .item .description {
            display: grid;
            position: absolute;
            bottom: 0;
            left: 0;
            color: #fff;
            padding: 10px;
            font-size: 17px;
            line-height: 18px;
            width: 100%;
            padding-top: 15px;
            padding-bottom: 15px;
            opacity: 1;
            color: #fff;
            transition: 0.8s ease;
            text-align: center;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
            background: linear-gradient(to bottom, transparent, rgba(0, 0, 0, 0.39));
        }

        .gallery-block.compact-gallery .item .description .description-heading {
            font-size: 1em;
            font-weight: bold;
        }

        .gallery-block.compact-gallery .item .description .description-body {
            font-size: 0.8em;
            margin-top: 10px;
            font-weight: 300;
        }

        @media (min-width: 576px) {

            .gallery-block.compact-gallery .item .description {
                opacity: 0;
            }

            .gallery-block.compact-gallery .item a:hover .description {
                opacity: 1;
            }

            .gallery-block .zoom-on-hover:hover .image {
                transform: scale(1.3);
                opacity: 0.7;
            }
        }

    </style>
    <style type="text/css">
        .highlighted {
            background-color: #ffff99!important;
            transition:background-color 0.1s ease;
        }

        .dropzone.dropzone-default {
            padding: 100px!important;
        }

    </style>
@endsection
@section('breadcrumb')


@endsection
@section('content')
    @include('flash-message')
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Portlet-->
            <div class="card card-custom">
                <div class="card-header card-header-tabs-line">
                    <div class="card-title">
                        <h3 class="card-label">@lang('products.edit')</h3>
                    </div>
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                    <span class="nav-icon"><i class="la la-tag"></i></span>
                                    <span class="nav-text">@lang('products.basicInfo')</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3" onclick="getGallery()">
                                    <span class="nav-icon"><i class="la la-image"></i></span>
                                    <span class="nav-text">@lang('products.gallery')</span>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_3">
                                    <span class="nav-icon"><i class="la la-cloud-upload"></i></span>
                                    <span class="nav-text">@lang('products.uploadImages')</span>
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                            <form class="kt-form" method="POST" action="{{ route('admin.products.update', $product->id) }}" id="main-form">
                                @csrf
                                @method('PUT')
                                <div class="kt-portlet__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="row">
                                            <div class="form-group col-md">
                                                <label for="name" class="form-control-label">@lang('products.name')</label>
                                                <input type="text" name="name" value="{{ $product->name }}" id="name" class="form-control">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="name_en" class="form-control-label">@lang('products.name_en')</label>
                                                <input type="text" name="translations[name][1][value]" value="{{ $product->trans('name', 'en') }}" class="form-control">
                                                <input type="hidden" name="translations[name][1][local]" value="en" class="form-control">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="active" class="form-control-label">@lang('products.active')</label>
                                                <select name="active" id="active" class="form-control">
                                                    <option value="yes" {{ ('yes' == $product->active) ? 'selected' : '' }}>@lang('products.yes')</option>
                                                    <option value="no" {{ ('no' == $product->active) ? 'selected' : '' }}>@lang('products.no')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md">
                                                <label for="price" class="form-control-label">@lang('products.image')</label>
                                                <input class="form-control" name="image" type="file" id="image">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="price" class="form-control-label">@lang('products.price')</label>
                                                <input class="form-control" name="price" type="number" id="price" min="0" value="{{ $product->price }}">
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="taxable" class="form-control-label">@lang('products.taxable')</label>
                                                <select name="taxable" id="taxable" class="form-control">
                                                    <option value="1" {{ ('1' == $product->taxable) ? 'selected' : '' }}>@lang('products.yes')</option>
                                                    <option value="0" {{ ('0' == $product->taxable) ? 'selected' : '' }}>@lang('products.no')</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md">
                                                <label for="description" class="form-control-label">@lang('products.description')</label>
                                                <textarea class="form-control" rows="6" name="description" id="description">{{ $product->description }}</textarea>
                                            </div>
                                            <div class="form-group col-md">
                                                <label for="description_en" class="form-control-label">@lang('products.description_en')</label>
                                                <textarea class="form-control" rows="6" name="translations[description][1][value]" id="description_en">{{ $product->trans('description', 'en') }}</textarea>
                                                <input type="hidden" name="translations[description][1][local]" value="en" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-portlet__foot">
                                    <div class="kt-form__actions">
                                        <button onclick="submitForm('#main-form')" id="submit-button" class="btn btn-primary">@lang('admin.save')</button>
                                        <button type="reset" onclick=""
                                                class="btn btn-secondary">@lang('admin.close')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">

                        </div>
                        <div class="tab-pane fade" id="kt_tab_pane_3_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                            <div class="form-group row">
                                <div class="col-md">
                                    <label class="col-form-label">@lang('products.images')</label>

                                    <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                        <div class="dropzone-msg dz-message needsclick">
                                            <h3 class="dropzone-msg-title">@lang('dropdownzone.drop_files_here')</h3>
                                            <span class="dropzone-msg-desc">@lang('dropdownzone.only_image_files')</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--end::Portlet-->

        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        function getGallery() {
            let url = "{{ route('admin.products.images', $product->id) }}";
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                beforeSend: () => {
                    $('#kt_tab_pane_2_3').html(`<div class="row align-items-center " style="min-height: 400px">

                            <div style="margin: auto" class="kt-spinner kt-spinner--v2 kt-spinner--md kt-spinner--danger"></div>

                    </div>`);
                }
            }).done(function (data) {
                $('#kt_tab_pane_2_3').html(data);
                baguetteBox.run('.compact-gallery', {animation: 'slideIn'});
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }

        $('#kt_dropzone_3').dropzone({
            url: "{{ route('admin.products.images.set', $product->id) }}", // Set the url for your upload script location
            paramName: "images[]", // The name that will be used to transfer the file
            params: {
                '_token': '{{ csrf_token() }}'
            },
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            method: 'POST',
            acceptedFiles: "image/*",
            accept: function(file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
    <script type="text/javascript">
        function submitForm (id) {
            $('#submit-button').attr('disabled', '');
            $('#submit-button').attr('onclick', '');
            $('#submit-button').addClass('kt-spinner');
            $('#submit-button').addClass('kt-spinner--right');
            $('#submit-button').addClass(' kt-spinner--md');
            $('#submit-button').addClass('kt-spinner--light');
            $(id).submit();
        }
    </script>
@endsection
