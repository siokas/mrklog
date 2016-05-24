@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <p style="font-weight: bold; text-decoration: underline;">User Settings</p>
                {!! Form::open(['route' => 'save.settings']) !!}
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ $data['name'] }}">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" value="{{ $data['email'] }}" disabled>
                        </div>
                    </div>
                    <br />
                    <p style="font-weight: bold; text-decoration: underline;">Post Settings</p>

                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Show posts only from certified authors: <input type="checkbox" name="certified" {{ $settings['certified'] ? 'checked' : '' }}>
                        </div>
                    </div>
                    <br />
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Appear tags on home page: <input type="checkbox" name="tags" {{ $settings['tags'] ? 'checked' : '' }}>
                        </div>
                    </div>
                    <br />
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Show first: 
                            <select name="show_first">
                              <option value="show-1" {{ $settings['show_first'] == 'show-1' ? 'selected' : ''}}>Created Latest</option>
                              <option value="show-2" {{ $settings['show_first'] == 'show-2' ? 'selected' : ''}}>Updated Latest</option>
                              <option value="show-3" {{ $settings['show_first'] == 'show-3' ? 'selected' : ''}}>Certified posts</option>
                              <option value="show-4" {{ $settings['show_first'] == 'show-4' ? 'selected' : ''}}>Most popular posts</option>
                            </select>
                        </div>
                     </div>
                     <br />
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Pagination Post Count: 
                            <select name="pagination_count">
                              <option value="5" {{ $settings['pagination_count'] == 5 ? 'selected' : ''}}>5</option>
                              <option value="10" {{ $settings['pagination_count'] == 10 ? 'selected' : ''}}>10</option>
                              <option value="15" {{ $settings['pagination_count'] == 15 ? 'selected' : ''}}>15</option>
                              <option value="20" {{ $settings['pagination_count'] == 20 ? 'selected' : ''}}>20</option>
                            </select>
                        </div>
                     </div>
                     <br />
                      <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Pagination Type: 
                            <select name="pagination_type">
                              <option value="0" {{ $settings['pagination_type'] == 0 ? 'selected' : ''}}>Previous-Next</option>
                              <option value="1" {{ $settings['pagination_type'] == 1 ? 'selected' : ''}}>Page Numbering</option>
                            
                            </select>
                        </div>
                     </div>
                     <br />
                     <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            Date and Time Format: 
                            <select name="date_format">
                                <option value="L" {{ $settings['date_format'] == 'L' ? 'selected' : ''}}>MM/DD/YYYY (12/07/2014)</option> {{-- format('L') --}}
                                <option value="l" {{ $settings['date_format'] == 'l' ? 'selected' : ''}}>DD/MM/YYYY (07/12/2014)</option> {{-- format('l') --}}
                                <option value="LL" {{ $settings['date_format'] == 'LL' ? 'selected' : ''}}>MMMM D, YYYY (December 7, 2014)</option> {{-- format('LL') --}}
                                <option value="ll" {{ $settings['date_format'] == 'll' ? 'selected' : ''}}>Mm D, YYYY (Dec 7, 2014)</option>{{-- format('ll') --}}
                                <option value="LLL" {{ $settings['date_format'] == 'LLL' ? 'selected' : ''}}>MMMM D, YYYY HH:MM (December 7, 2014 8:12 PM)</option>{{-- format('LLL') --}}
                                <option value="lll" {{ $settings['date_format'] == 'lll' ? 'selected' : ''}}>Mm D, YYYY HH:MM (Dec 7, 2014 8:12 PM)</option>{{-- format('lll') --}}
                                <option value="LLLL" {{ $settings['date_format'] == 'LLLL' ? 'selected' : ''}}>DDDD, MMMM DD, YYYY HH:MM (Sunday, December 7, 2014 8:12 PM)</option>{{-- format('LLLL') --}}
                                <option value="llll" {{ $settings['date_format'] == 'llll' ? 'selected' : ''}}>Dd, Mm DD, YYYY HH:MM (Sun, Dec 7, 2014 8:12 PM)</option>{{-- format('llll') --}}
                            </select>
                        </div>
                     </div>
                    <br />
                    {{-- Add custom shortcode at the end of each of your posts: 
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Shortcode</label>
                            <textarea type="text" class="form-control" placeholder="Shortcode" name="shortcode" id="shortcode" rows="5"></textarea>
                        </div>
                    </div>
                    <br /> --}}
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-default">Save Settings</button>
                        </div>
                    </div>
                {!! Form::close() !!}

                {!! Form::open(['route' => 'user.delete', 'method' => 'delete']) !!}
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-danger">Delete Account</button>
                    </div>
                </div>
                {!! Form::close() !!}

            </div>
        </div>
    </div>
@endsection