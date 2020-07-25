@extends('layouts.master1')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADMIN DASHBOARD
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"><i class="fa fa-dashboard"></i> Mentoee</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-warning">
        <h4>Tip!</h4>

        <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p>
      </div>
  
    


        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-success">
            Launch Success Modal
          </button>

          <articles></articles>


        <div class="modal modal-success fade" id="modal-success">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Success Modal</h4>
                </div>
                <div class="modal-body">
                  <p>One fine body&hellip;</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-outline">Save changes</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>
          <!-- /.modal -->
         
      {{-- /Table Display --}}

    </section>
    <!-- /.content -->
@endsection