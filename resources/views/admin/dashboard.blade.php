@extends('layouts.app')

@section('content')

    

    <!-- Main content -->
    <section class="content">
      <div class="callout callout-warning">
        <h4>Tip!</h4>

        <p>Add the fixed class to the body tag to get this layout. The fixed layout is your best option if your sidebar
          is bigger than your content because it prevents extra unwanted scrolling.</p>
      </div>
      
      <dashboard></dashboard>

      
    </section>
    <!-- /.content -->
@endsection