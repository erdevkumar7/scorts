@extends('admin.layout')

@section('page_content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_content">
                <br />

                <form action="{{route('admin.post.escorts')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Mandatory Fields -->
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="nick-name">Nickname <span
                                class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="nick-name" name="nickname" class="form-control ">
                        </div>
                        @error('nickname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="description">Description<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="pictures">Pictures<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" id="pictures" name="pictures[]">
                        </div>
                        @error('pictures[]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="phone_number">Phone Number<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" class="form-control" id="phone_number" name="phone_number">
                        </div>
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="age" class="col-form-label col-md-3 col-sm-3 label-align">Age <span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="age" name="age">
                                <option value="18-25">18-25</option>
                                <option value="26-35">26-35</option>
                                <option value="36-45">36-45</option>
                                <option value="45-55">45-55</option>
                                <option value="56+">56+</option>
                            </select>
                        </div>
                        @error('age')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="canton" class="col-form-label col-md-3 col-sm-3 label-align">Canton<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="canton" name="canton">
                                <option value="first">canton1</option>
                            </select>
                        </div>
                        @error('canton')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="city" class="col-form-label col-md-3 col-sm-3 label-align">City<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="city" name="city" >
                                <!-- Add options dynamically from the database -->
                                <option value="first">city1</option>
                            </select>
                        </div>
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="services" class="col-form-label col-md-3 col-sm-3 label-align">Services<span
                                class="required">*<span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="services" name="services[]" multiple>
                                <!-- Add options dynamically from the database -->
                                <option>Choose option</option>
								<option>Option one</option>
                            </select>
                        </div>
                        @error('services[]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="origin" class="col-form-label col-md-3 col-sm-3 label-align">Origin<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="origin" name="origin">
                                <option value="Caucasian">Caucasian</option>
                                <option value="Latin">Latin</option>
                                <option value="Asian">Asian</option>
                                <option value="Oriental">Oriental</option>
                                <option value="Black">Black</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        @error('origin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="type" class="col-form-label col-md-3 col-sm-3 label-align">Type<span
                                class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="type" name="type" required>
                                <option value="Independent Escort">Independent Escort</option>
                                <option value="Escort">Escort</option>
                                <option value="Trans">Trans</option>
                                <option value="SM">SM</option>
                                <option value="Salon">Salon</option>
                            </select>
                        </div>
                        @error('type')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Non-Mandatory Fields -->
                    <div class="item form-group">
                        <label for="videos" class="col-form-label col-md-3 col-sm-3 label-align">Videos</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="file" class="form-control" id="videos" name="videos[]" multiple>
                        </div>
                        @error('videos[]')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="hair_color" class="col-form-label col-md-3 col-sm-3 label-align">Hair Color</label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" id="hair_color" name="hair_color">
                                <option value="">Select</option>
                                <option value="Brunette">Brunette</option>
                                <option value="Blonde">Blonde</option>
                                <option value="Red">Red</option>
                                <option value="Auburn">Auburn</option>
                                <option value="Grey">Grey</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        @error('hair_color')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="item form-group">
                        <label for="hair_length" class="col-form-label col-md-3 col-sm-3 label-align">Hair Length</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="hair_length" name="hair_length">
                                <option value="">Select</option>
                                <option value="Short">Short</option>
                                <option value="Medium">Medium</option>
                                <option value="Long">Long</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="breast_size" class="col-form-label col-md-3 col-sm-3 label-align">Breast Size</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="breast_size" name="breast_size">
                                <option value="">Select</option>
                                <option value="Small">Small</option>
                                <option value="Medium">Medium</option>
                                <option value="Large">Large</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="height" class="col-form-label col-md-3 col-sm-3 label-align">Height (cm)</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" class="form-control" id="height" name="height">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="weight" class="col-form-label col-md-3 col-sm-3 label-align">Weight (kg)</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" class="form-control" id="weight" name="weight">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="build" class="col-form-label col-md-3 col-sm-3 label-align">Build</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="build" name="build">

                                <option value="">Select</option>
                                <option value="Slim">Slim</option>
                                <option value="Normal">Normal</option>
                                <option value="Chubby">Chubby</option>
                                <option value="Large">Large</option>
                                <option value="Muscular">Muscular</option>
                            </select>
                        </div>
                    </div>


                    <div class="item form-group">
                        <label for="smoker" class="col-form-label col-md-3 col-sm-3 label-align">Smoker</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="checkbox" id="smoker" name="smoker">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="languages_spoken" class="col-form-label col-md-3 col-sm-3 label-align">Languages
                            Spoken</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="languages_spoken" name="languages_spoken[]" multiple>
                                <option value="French">French</option>
                                <option value="English">English</option>
                                <option value="German">German</option>
                                <option value="Italian">Italian</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Arabic">Arabic</option>
                                <option value="Russian">Russian</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="address" class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="outcall" class="col-form-label col-md-3 col-sm-3 label-align">Outcall</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="checkbox" id="outcall" name="outcall">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="incall" class="col-form-label col-md-3 col-sm-3 label-align">Incall</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="checkbox" id="incall" name="incall">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="whatsapp_number" class="col-form-label col-md-3 col-sm-3 label-align">WhatsApp
                            Number</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="availability"
                            class="col-form-label col-md-3 col-sm-3 label-align">Availability</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control" id="availability" name="availability">
                        </div>
                    </div>
                    <div class="container d-flex justify-content-center align-items-center">
                        <div class="item form-group">
                            <label for="parking">Parking</label>
                            <span>
                                <input type="checkbox" id="parking" name="parking">
                            </span>
                        </div>

                        <div class="item form-group">
                            <label for="disabled">Disabled</label>
                            <span>
                                <input type="checkbox" id="disabled" name="disabled">
                            </span>
                        </div>

                        <div class="item form-group">
                            <label for="accepts_couples">Accepts
                                Couples</label>
                            <span>
                                <input type="checkbox" id="accepts_couples" name="accepts_couples">
                            </span>
                        </div>

                        <div class="item form-group">
                            <label for="elderly">Elderly</label>
                            <span>
                                <input type="checkbox" id="elderly" name="elderly">
                            </span>
                        </div>

                        <div class="item form-group">
                            <label for="air_conditioned">Air
                                Conditioned</label>
                            <span>
                                <input type="checkbox" id="air_conditioned" name="air_conditioned">
                            </span>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="rates_in_chf" class="col-form-label col-md-3 col-sm-3 label-align">Rates in
                            CHF</label>
                        <div class="col-md-6 col-sm-6">
                            <input type="number" class="form-control" id="rates_in_chf" name="rates_in_chf">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="currencies_accepted" class="col-form-label col-md-3 col-sm-3 label-align">Currencies
                            Accepted</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="currencies_accepted" name="currencies_accepted[]" multiple>
                                <option value="CHF">CHF</option>
                                <option value="EUR">EUR</option>
                                <option value="USD">USD</option>
                            </select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="payment_methods" class="col-form-label col-md-3 col-sm-3 label-align">Payment
                            Methods</label>
                        <div class="col-md-6 col-sm-6">
                            <select class="form-control" id="payment_methods" name="payment_methods[]" multiple>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection