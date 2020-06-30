<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/croppie.js') }}" defer></script>
    <script language="JavaScript" type="text/javascript" src="{{ asset('js/nav.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/nav.css') }}" rel="stylesheet">
    <link href="{{ asset('css/croppie.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-10">
              <div class="row">
                  <div class="col-md-5 p-3 bg-dark offset-md-1">
                      <ul class="list-group shadow-lg connectedSortable" id="padding-item-drop">
                        @if(!empty($panddingItem) && $panddingItem->count())
                          @foreach($panddingItem as $key=>$value)
                            <li class="list-group-item" item-id="{{ $value->id }}">{{ $value->lastname }}</li>
                          @endforeach
                        @endif
                      </ul>
                  </div>
                  <div class="col-md-5 p-3 bg-dark offset-md-1 shadow-lg complete-item">
                      <ul class="list-group  connectedSortable" id="complete-item-drop">
                        @if(!empty($completeItem) && $completeItem->count())
                          @foreach($completeItem as $key=>$value)
                            <li class="list-group-item " item-id="{{ $value->id }}">{{ $value->lastname }}</li>
                          @endforeach
                        @endif
                      </ul>
                  </div>
              </div>
          </div>
        </div>
      </div>
      <script>
        $( function() {
            
          $( "#padding-item-drop, #complete-item-drop" ).sortable({
            connectWith: ".connectedSortable",
            opacity: 0.5,
          }).disableSelection();
      
          $( ".connectedSortable" ).on( "sortupdate", function( event, ui ) {
              var panddingArr = [];
              var completeArr = [];
              
      
              $("#padding-item-drop li").each(function( index ) {
                panddingArr[index] = $(this).attr('item-id');
              });
      
              $("#complete-item-drop li").each(function( index ) {
                completeArr[index] = $(this).attr('item-id');
              });
              
              $.ajax({
                  url: "{{ route('updateOwnerPossession') }}",
                  method: 'POST',
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  },
                  data: {panddingArr:panddingArr,completeArr:completeArr,possession:"{{$possession}}"},
                  success: function(data) {
                    console.log('success');
                  }
              });
                
          });
        });
      </script>

</body>