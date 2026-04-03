{{-- <input type="hidden" name="_method" value="PUT"/> --}}
        <div class="col-md-12">
            <!-- Input Fields -->
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">Contact Information</span>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Site Name</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="" name="site_name" class="form-control" placeholder=""
                                       value="{{$data->site_name}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="phone" class="form-control" placeholder=""
                                       value="{{$data->phone}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Header Phone</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="fax" class="form-control" placeholder=""
                                       value="{{$data->fax}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Primary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="email_primary" class="form-control"
                                       placeholder="" value="{{$data->email_primary}}"/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Email Secondary</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                <input type="text" id="inputStandard" name="email_secondary" class="form-control"
                                       placeholder="" value="{{$data->email_secondary}}"/>
                            </div>
                        </div>
                    </div>

                    
                    
                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Key</label>
                        <div class="col-lg-8">
                            <div class="bs-component">
                                 <textarea class="form-control" id="contentEditor5" name="meta_key"
                                          rows="3">{{$data->meta_key}}</textarea>
                                          </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputStandard" class="col-lg-2 control-label">Meta Description</label>
                        <div class="col-lg-8">
                            <div class="bs-component"> <textarea class="form-control" id="contentEditor5" name="meta_description"
                                          rows="3">{{$data->meta_description}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Location</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <input type="text" class="form-control" id="contentEditor4" name="address"
                                       value="{{$data->address}}"/>
                            </div>
                        </div>
                    </div>          

                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2">Copyright Text</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor3" name="copyright_text"
                                          rows="3">{{$data->copyright_text}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2"> Google Map Link </label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor1" name="google_map"
                                          rows="3">{{$data->google_map}}</textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-lg-2 control-label" for="textArea2"> Google Map iframe</label>
                        <div class="col-lg-9">
                            <div class="bs-component">
                                <textarea class="form-control" id="contentEditor1" name="google_map2"
                                          rows="3">{{$data->google_map2}}</textarea>
                            </div>
                        </div>
                    </div>
                <div class="form-group">
                <label for="inputStandard" class="col-lg-2 control-label">Footer Brief</label>
                <div class="col-lg-8">
                    <div class="bs-component">
                    <textarea name="flight_brief" id="" class="form-control">{{$data->flight_brief}}</textarea>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
        
        