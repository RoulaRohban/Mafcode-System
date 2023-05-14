{{-- Subheader --}}
<div class="subheader pt-2 pb-2 {{ Metronic::printClasses('subheader', false) }}" id="kt_subheader">
    <div class="{{ Metronic::printClasses('subheader-container', false) }} d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <div class="d-flex align-items-center flex-wrap mr-2">

            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ @$page_title }}

                @if (isset($page_description) && config('layout.subheader.displayDesc'))
                    <small>{{ @$page_description }}</small>
                @endif
            </h5>

            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4"></div>

            <span class="text-muted font-weight-bold mr-4">#XRS-45670</span>

            <a href="#" class="btn btn-light-warning font-weight-bolder btn-sm">
                Add New
            </a>
        </div>
        <div class="d-flex align-items-center">
            <a href="#" class="btn btn-clean btn-hover-light-primary- active btn-sm font-weight-bold font-size-base mr-1">
                Today
            </a>

            <a href="#" class="btn btn-clean btn-hover-light-primary-  btn-sm font-weight-bold font-size-base  mr-1">
                Month
            </a>

            <a href="#" class="btn btn-clean btn-hover-light-primary-  btn-sm font-weight-bold font-size-base mr-1">
                Year
            </a>


        </div>
    </div>
</div>
