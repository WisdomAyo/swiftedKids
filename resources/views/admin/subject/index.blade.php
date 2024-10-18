@extends('admin.main')
@section('content')


@if(session('success'))
<script>
    Swal.fire({
        title: 'Success!',
        text: "{{ session('success') }}",
        icon: 'success',
        confirmButtonText: 'OK'
    });
</script>
@endif

<div class="body-wrapper">
    <div class="container-fluid">
      <div class="position-relative mb-4">
        <div class="d-flex justify-content-between align-items-center">
          <div>
            <h4>Subject Module</h4>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a class="text-primary text-decoration-none" href="/">Home
                  </a>
                </li>
                <li class="breadcrumb-item d-flex justify-content-center align-items-center ps-0">
                  <iconify-icon icon="tabler:chevron-right"></iconify-icon>
                </li>
                <li class="breadcrumb-item" aria-current="page">Subject / Subject Category</li>
              </ol>
            </nav>
          </div>
          <div>
            <div class="d-flex justify-content-end align-items-center">
              <div class="me-2">
                <div class="breadbar"></div>
              </div>
              <div>

                <button type="button" class="btn mb-1 bg-warning-subtle text-warning  px-4 fs-4 " data-bs-toggle="modal" data-bs-target="#al-warning-alert">
                    Add Subject
                  </button>
                  <button type="button" class="btn mb-1 bg-success-subtle text-success  px-4 fs-4 " data-bs-toggle="modal" data-bs-target="#al-success-alert">
                   Add Category
                  </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row -->
      <div class="row">

        <div class="col-12">
          <!-- 10. category card -->
          <div class="d-flex border-bottom title-part-padding px-0 mb-3 align-items-center">
            <h4 class="mb-0 fs-5">Category Card</h4>
          </div>
        </div>
        @foreach($categories as $category)
        <div class="col-md-6 col-lg-3">
          <div class="card rounded-3 card-hover">

            <div class="card-body">
              <div class="d-flex align-items-center">
                <span class="flex-shrink-0">
                  <i class="ti ti-photo text-warning display-6"></i>
                </span>
                <div class="ms-4 flex">
                  <h4 class="card-title text-dark">{{ $category->name }}</h4>
                  <h6 class="card-subtitle mb-0 fs-2 fw-normal">
                    2.4GB Junk File
                  </h6>
                  <span class="fs-2 mt-1 ">Folder: 26 Items: 159 Used: 23.6GB</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach








        </div>
      </div>
    </div>


    <!-- 6. advertise card -->



    <div class="modal fade" id="al-success-alert" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content modal-filled bg-success-subtle text-success">
            <div class="modal-body p-4">
              <div class=" text-success">
                <i class="ti ti-circle-check fs-7"></i>
                <h4 class="mt-2">Add Category</h4>
                <form action="{{ route('admin.subject.store') }}" method="POST"  class="ps-3 pr-3">
                    @csrf
                    <div class="mb-3">
                      <label for="emailaddress1">Category Name </label>
                      <input   name="category_name" class="form-control" required="" placeholder="Mathematics" />
                    </div>


                    <div class="mb-3 text-center">

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light my-2" data-bs-dismiss="modal"> Save</button>
                  </form>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>




      <div class="modal fade" id="al-warning-alert" tabindex="-1" aria-labelledby="vertical-center-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content modal-filled bg-warning-subtle">
            <div class="modal-body p-4">
              <div class=" text-warning">
                <i class="ti ti-alert-octagon fs-7"></i>
                <h4 class="mt-2">Add Subject</h4>
                <form action="{{ route('admin.subject.store') }}" method="POST"  class="ps-3 pr-3">
                    @csrf
                    <div class="mb-3">
                      <label for="emailaddress1">Subject Name </label>
                      <input  name="subject_name" class="form-control" required="" placeholder="Mathematics" />
                    </div>

                    <div class="mb-3">
                      <label for="password1">Category</label>
                      <select name="category_id" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    </div>



                    <div class="mb-3 text-center">

                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-light my-2" data-bs-dismiss="modal"> Save</button>
                  </form>


                </button>
              </div>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
      </div>




@endsection
