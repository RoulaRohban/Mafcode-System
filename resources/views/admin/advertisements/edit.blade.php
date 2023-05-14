<?php //dd($errors) ?>
@extends('layout.default')

@section('title',trans('advertisements.edit'))
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
            background-color: #ffff99 !important;
            transition: background-color 0.1s ease;
        }

        .dropzone.dropzone-default {
            padding: 100px !important;
        }

    </style>
@endsection
@section('breadcrumb')

@endsection
@section('content')
    @include('flash-message')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-custom">
                <!--begin::Card header-->
                <div class="card-header card-header-tabs-line nav-tabs-line-3x">
                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-bold nav-tabs-line nav-tabs-line-3x">
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1">
                                    <i class="la la-tag"></i>
                                    <span class="nav-text font-size-lg">@lang('advertisements.basic_info')</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link" onclick="getGallery()" data-toggle="tab" href="#kt_user_edit_tab_2">
                                    <i class="la la-image"></i>
                                    <span class="nav-text font-size-lg">@lang('advertisements.gallery')</span>
                                </a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_user_edit_tab_3">
                                    <i class="la la-cloud-upload"></i>
                                    <span class="nav-text font-size-lg">@lang('advertisements.upload_images')</span>
                                </a>
                            </li>
                            <!--end::Item-->
                        </ul>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body">
                        <div class="tab-content">
                            <!--begin::Tab-->
                            <div class="tab-pane show px-7 active" id="kt_user_edit_tab_1" role="tabpanel">

                                <!--begin::Form-->
                                <form method="POST" enctype="multipart/form-data"
                                      action="{{ route('admin.advertisements.update', $advertisement->id) }}"
                                      id="main-form">
                                    @csrf
                                    @method('PUT')
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="form-group row">
                                                <label class="col-xl-5 col-lg-3 col-form-label"></label>
                                                <div class="image-input image-input-empty image-input-outline" id="kt_user_edit_avatar" style="background-image: url('{{ $advertisement->primaryImage()->image_url ?? asset('media/users/blank.png') }}')">
                                                    <div class="image-input-wrapper"></div>
                                                    <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                        <i class="fa fa-pen icon-sm text-muted"></i>
                                                        <input type="file" name="image" accept=".png, .jpg, .jpeg">
                                                        <input type="hidden" name="profile_avatar_remove">
                                                    </label>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="" data-original-title="Cancel avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                    <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="" data-original-title="Remove avatar">
                                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md">
                                                    <label for="type"
                                                           class="form-control-label">@lang('advertisements.type')</label>
                                                    <select name="type" id="type" class="form-control">
                                                        <option value="found" {{ ('found' == $advertisement->type) ? 'selected' : '' }}>@lang('advertisements.found')</option>
                                                        <option value="lost" {{ ('lost' == $advertisement->type) ? 'selected' : '' }}>@lang('advertisements.lost')</option>
                                                        <option value="need" {{ ('need' == $advertisement->type) ? 'selected' : '' }}>@lang('advertisements.need')</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="title"
                                                           class="form-control-label">@lang('advertisements.title')</label>
                                                    <input type="text" name="title" id="title" class="form-control"
                                                           value="{{ $advertisement->title }}">
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="title_en" class="form-control-label">@lang('advertisements.title_en')</label>
                                                    <input type="text" name="translations[title][1][value]" value="{{ $advertisement->getTranslation('title','en') }}" class="form-control">
                                                    <input type="hidden" name="translations[title][1][local]" value="en" class="form-control">
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="active"
                                                           class="form-control-label">@lang('advertisements.active')</label>
                                                    <select name="active" id="active" class="form-control">
                                                        <option value="yes" {{ ('yes' == $advertisement->active) ? 'selected' : '' }}>@lang('advertisements.yes')</option>
                                                        <option value="no" {{ ('no' == $advertisement->active) ? 'selected' : '' }}>@lang('advertisements.no')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md">
                                                    <label for="user_id"
                                                           class="form-control-label">@lang('advertisements.user_id')</label>
                                                    <select name="user_id" id="user_id" class="form-control">
                                                        @foreach($users as $user)
                                                            <option value='{{ $user->id }}' {{ ($user->id == $advertisement->user_id) ? 'selected' : '' }}>
                                                                {{ $user->email }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="category_id"
                                                           class="form-control-label">@lang('advertisements.category_id')</label>
                                                    <select name="category_id" id="category_id" class="form-control">
                                                        @foreach($categories as $category)
                                                            <option value='{{ $category->id }}' {{ ($category->id == $advertisement->category_id) ? 'selected' : '' }}>
                                                                {{ $category->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="status"
                                                           class="form-control-label">@lang('advertisements.status')</label>
                                                    <select name="status" id="status" class="form-control">
                                                        <option value="found" {{ ('found' == $advertisement->status) ? 'selected' : '' }}>@lang('advertisements.found')</option>
                                                        <option value="not_found" {{ ('not_found' == $advertisement->status) ? 'selected' : '' }}>@lang('advertisements.not_found')</option>
                                                    </select>
                                                </div>
{{--                                                <div class="form-group col-md">--}}
{{--                                                    <label for="image"--}}
{{--                                                           class="form-control-label">@lang('advertisements.image')</label>--}}
{{--                                                    <input class="form-control" name="image" type="file" id="image">--}}
{{--                                                </div>--}}
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md">
                                                    <label for="location"
                                                           class="form-control-label">@lang('advertisements.country')</label>
                                                    <select name="country_id" id="country_id" onchange="getCities()"
                                                            class="form-control">
                                                        <option value="">@lang('advertisements.select_country')</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md d-none" id="city">
                                                    <label for="location"
                                                           class="form-control-label">@lang('advertisements.city')</label>
                                                    <select name="city_id" id="city_id" onchange="getRegions('region')"
                                                            class="form-control">
                                                        <option value="">@lang('advertisements.select_country')</option>

                                                    </select>
                                                </div>
                                                <div class="form-group col-md d-none" id="region">
                                                    <label for="location"
                                                           class="form-control-label">@lang('advertisements.region')</label>
                                                    <select name="region_id" id="region_id" class="form-control">
                                                        <option value="">@lang('advertisements.select_country')</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md">
                                                    <label for="description"
                                                           class="form-control-label">@lang('advertisements.description')</label>
                                                    <textarea class="form-control" rows="6" name="description"
                                                              id="description">{{ $advertisement->description }}</textarea>
                                                </div>
                                                <div class="form-group col-md">
                                                    <label for="description_en" class="form-control-label">@lang('advertisements.description_en')</label>
                                                    <textarea class="form-control" rows="6" name="translations[description][1][value]"
                                                              id="description">{{ $advertisement->getTranslation('description','en') }}</textarea>
                                                    <input type="hidden" name="translations[description][1][local]" value="en" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <button onclick="submitForm('#main-form')" id="submit-button"
                                                    class="btn btn-primary">@lang('admin.save')</button>
                                            <button type="reset" onclick=""
                                                    class="btn btn-secondary">@lang('admin.close')</button>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form-->
                            </div>
                            <!--end::Tab-->
                            <!--begin::Tab-->
                            <div class="tab-pane px-7" id="kt_user_edit_tab_2" role="tabpanel">

                            </div>
                            <!--end::Tab-->
                            <!--begin::Tab-->
                            <div class="tab-pane px-7" id="kt_user_edit_tab_3" role="tabpanel">
                                <div class="form-group row">
                                    <div class="col-md">
                                        <label class="col-form-label">@lang('advertisements.images')</label>

                                        <div class="dropzone dropzone-default dropzone-success" id="kt_dropzone_3">
                                            <div class="dropzone-msg dz-message needsclick">
                                                <h3 class="dropzone-msg-title">@lang('advertisements.upload_file')</h3>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--end::Tab-->
                        </div>
                </div>
                <!--begin::Card body-->
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('js/pages/custom/user/edit-user.js?v=7.1.5') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        function getGallery() {
            let url = "{{ route('admin.advertisements.images', $advertisement->id) }}";
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                beforeSend: () => {
                    $('#kt_user_edit_tab_2').html(`<div class="row align-items-center " style="min-height: 400px">

                            <div style="margin: auto" class="kt-spinner kt-spinner--v2 kt-spinner--md kt-spinner--danger"></div>

                    </div>`);
                }
            }).done(function (data) {
                $('#kt_user_edit_tab_2').html(data);
                baguetteBox.run('.compact-gallery', {animation: 'slideIn'});
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }

        $('#kt_dropzone_3').dropzone({
            url: "{{ route('admin.advertisements.images.set', $advertisement->id) }}", // Set the url for your upload script location
            paramName: "images[]", // The name that will be used to transfer the file
            params: {
                '_token': '{{ csrf_token() }}'
            },
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            method: 'POST',
            acceptedFiles: "image/*",
            accept: function (file, done) {
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else {
                    done();
                }
            }
        });
    </script>
    <script type="text/javascript">
        function submitForm(id) {
            $('#submit-button').attr('disabled', '');
            $('#submit-button').attr('onclick', '');
            $('#submit-button').addClass('kt-spinner');
            $('#submit-button').addClass('kt-spinner--right');
            $('#submit-button').addClass(' kt-spinner--md');
            $('#submit-button').addClass('kt-spinner--light');
            $(id).submit();
        }

        $(document).ready(() => {
            setLocation();
        })

        function setLocation() {
            $('#country_id').val({{ $advertisement->getLocation()['country']->id ?? null }});

            @if($advertisement->getLocation()['region'] !== null)
            getCities('{{ $advertisement->getLocation()['city']->id }}');
            getRegions('{{ $advertisement->getLocation()['region']->id }}', city_id);
            @elseif($advertisement->getLocation()['city'] !== null)
            getCities('{{ $advertisement->getLocation()['city']->id }}');
            @endif
        }

        function getCities(selected_id) {
            let country_id = $('#country_id').val();
            let url = '{{ route('admin.countries.get.cities') }}';
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                data: {_token: '{{ csrf_token() }}', country_id: country_id}
            }).done(function (data) {
                $('#region').addClass('d-none');
                $('#city').addClass('d-none');
                $('#city_id').html('');
                if (data) {
                    $('#city').removeClass('d-none');
                    $('#city_id').html(data);
                    $('#city_id').val(selected_id);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }

        function getRegions(selected_id) {
            let city_id = 0
            if ($('#city_id').val())
                city_id = $('#city_id').val();
            else
                city_id = '{{ $advertisement->getLocation()['city']->id ?? null }}';
            let url = '{{ route('admin.cities.get.regions') }}';
            $.ajax({
                url: url,
                type: 'GET',
                datatype: 'HTML',
                data: {_token: '{{ csrf_token() }}', city_id: city_id}
            }).done(function (data) {
                $('#region').addClass('d-none');
                $('#region_id').html('');
                if (data) {
                    $('#region').removeClass('d-none');
                    $('#region_id').html(data);
                    $('#region_id').val(selected_id);
                }
            }).fail(function (e) {
                swal("@lang('admin.fail'); ?>", e.responseJSON.message, "error")
            })
        }
    </script>
@endsection
