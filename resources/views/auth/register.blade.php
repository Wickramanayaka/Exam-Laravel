@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <div class="row justify-content-center">
        <div class="col text-center">
            <h3 class="h3 font-weight-bold text-danger">Register Now</h3>
        </div>
    </div>
    <br><br>
    <div class="row justify-content-center">
        <div class="col-md-8 offset-md-2 col-sm-12">
            <form method="POST" id="register-form" action="{{ route('register') }}" onsubmit="return validate()">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-row">
                  <div class="form-group col">
                    <label for="name"><h5>1. ඔබගේ නම (නමෙහි කොටස් 2 ක් පමණක් ඇතුලත් කරන්න. උදා.: Sampath Bandara)</h5></label>
                    <input type="text" name="name" id="name" class="form-control" autofocus value="{{ old('name') }}" required autocomplete="name">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="name"><h5>2. ලිපිනය (English letters භාවිතා කරන්න)</h5></label>
                    <input type="text" name="address_line" id="address_line" class="form-control" value="{{ old('address_line') }}" required autocomplete="address">
                    <small id="emailHelp" class="form-text text-muted">(නිවසට අංකයක් හෝ නමක් තිබේනම් එය සමග අංග සම්පූර්ණ තැපැල් ලිපිනය ඇතුළත් කරන්න.)</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-7">
                    <label for="formGroupExampleInput"><h5>3. ඔබ අ.පො.ස. සාමාන්‍යපෙළ විභාගයට පෙනී සිටින වර්ෂය  / පෙනී සිටිය වර්ෂය</h5></label>
                    <select class="form-control" name="ol_year" id="ol_year">
                          <option value='2016' {{old('ol_year')=="2016"?"selected":""}}>2016</option>
                          <option value='2017' {{old('ol_year')=="2017"?"selected":""}}>2017</option>
                          <option value='2018' {{old('ol_year')=="2018"?"selected":""}}>2018</option>
                          <option value='2019' {{old('ol_year')=="2019"?"selected":""}}>2019</option>
                          <option value='2020' {{old('ol_year')=="2020"?"selected":""}}>2020</option>
                          <option value='2021' {{old('ol_year')=="2021"?"selected":""}}>2021</option>
                          <option value='2022' {{old('ol_year')=="2022"?"selected":""}}>2022</option>
                          <option value='2023' {{old('ol_year')=="2023"?"selected":""}}>2023</option>
                          <option value='2024' {{old('ol_year')=="2024"?"selected":""}}>2024</option>
                          <option value='2025' {{old('ol_year')=="2025"?"selected":""}}>2025</option>
                          <option value='2026' {{old('ol_year')=="2026"?"selected":""}}>2026</option>
                          <option value='2027' {{old('ol_year')=="2027"?"selected":""}}>2027</option>
                          <option value='2028' {{old('ol_year')=="2028"?"selected":""}}>2028</option>
                          <option value='2030' {{old('ol_year')=="2030"?"selected":""}}>වෙනත්</option>
                    </select>
                    <small id="yearHelp" class="form-text text-muted">(ඔබ පාසල් ශිෂ්‍යයෙක් නෙවෙයි නම් කරුණාකර වෙනත් තෝරන්න.)</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-7">
                    <label for="formGroupExampleInput"><h5>4. ඔබ ලියාපදිංචි වන / ලියාපදිංචි වීමට අපේක්ෂිත පන්තිය</h5></label>
                    <select class="form-control" name="tuition_class" id="tuition_class">
                          @foreach ($tuition_classes as $item)
                              <option value="{{$item->id}}" {{old('tuition_class')==$item->id?"selected":""}}>{{$item->name}}</option>
                          @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="name"><h5>5. ඔබගේ උපන් දිනය</h5></label>
                    <div class="row">
                      <div class="col">
                        <select name="day" id="day" class="form-control" required autocomplete="day">
                          <option value="1" {{old('day')=="1"?"selected":""}}>1</option>
                          <option value="2" {{old('day')=="2"?"selected":""}}>2</option>
                          <option value="3" {{old('day')=="3"?"selected":""}}>3</option>
                          <option value="4" {{old('day')=="4"?"selected":""}}>4</option>
                          <option value="5" {{old('day')=="5"?"selected":""}}>5</option>
                          <option value="6" {{old('day')=="6"?"selected":""}}>6</option>
                          <option value="7" {{old('day')=="7"?"selected":""}}>7</option>
                          <option value="8" {{old('day')=="8"?"selected":""}}>8</option>
                          <option value="9" {{old('day')=="9"?"selected":""}}>9</option>
                          <option value="10" {{old('day')=="10"?"selected":""}}>10</option>
                          <option value="11" {{old('day')=="11"?"selected":""}}>11</option>
                          <option value="12" {{old('day')=="12"?"selected":""}}>12</option>
                          <option value="13" {{old('day')=="13"?"selected":""}}>13</option>
                          <option value="14" {{old('day')=="14"?"selected":""}}>14</option>
                          <option value="15" {{old('day')=="15"?"selected":""}}>15</option>
                          <option value="16" {{old('day')=="16"?"selected":""}}>16</option>
                          <option value="17" {{old('day')=="17"?"selected":""}}>17</option>
                          <option value="18" {{old('day')=="18"?"selected":""}}>18</option>
                          <option value="19" {{old('day')=="19"?"selected":""}}>19</option>
                          <option value="20" {{old('day')=="20"?"selected":""}}>20</option>
                          <option value="21" {{old('day')=="21"?"selected":""}}>21</option>
                          <option value="22" {{old('day')=="22"?"selected":""}}>22</option>
                          <option value="23" {{old('day')=="23"?"selected":""}}>23</option>
                          <option value="24" {{old('day')=="24"?"selected":""}}>24</option>
                          <option value="25" {{old('day')=="25"?"selected":""}}>25</option>
                          <option value="26" {{old('day')=="26"?"selected":""}}>26</option>
                          <option value="27" {{old('day')=="27"?"selected":""}}>27</option>
                          <option value="28" {{old('day')=="28"?"selected":""}}>28</option>
                          <option value="29" {{old('day')=="29"?"selected":""}}>29</option>
                          <option value="30" {{old('day')=="30"?"selected":""}}>30</option>
                          <option value="31" {{old('day')=="31"?"selected":""}}>31</option>
                        </select>
                      </div>
                      <div class="col">
                        <select  name="month" id="month" class="form-control" required autocomplete="month">
                          <option value="1" {{old('month')=="1"?"selected":""}}>ජනවාරි</option>
                          <option value="2" {{old('month')=="2"?"selected":""}}>පෙබරවාරි</option>
                          <option value="3" {{old('month')=="3"?"selected":""}}>මාර්තු</option>
                          <option value="4" {{old('month')=="4"?"selected":""}}>අප්‍රියෙල්</option>
                          <option value="5" {{old('month')=="5"?"selected":""}}>මැයි </option>
                          <option value="6" {{old('month')=="6"?"selected":""}}>ජුනි </option>
                          <option value="7" {{old('month')=="7"?"selected":""}}>ජූලි </option>
                          <option value="8" {{old('month')=="8"?"selected":""}}>අගෝස්තු </option>
                          <option value="9" {{old('month')=="9"?"selected":""}}>සැප්තැම්බර්</option>
                          <option value="10" {{old('month')=="10"?"selected":""}}>ඔක්තෝම්බර්</option>
                          <option value="11" {{old('month')=="11"?"selected":""}}>නොවැම්බර්</option>
                          <option value="12" {{old('month')=="12"?"selected":""}}>දෙසැම්බර්</option>
                        </select>
                      </div>
                      <div class="col">
                        <select name="year" id="year" class="form-control" required autocomplete="year">
                          <option value="2000" {{old('year')=="2000"?"selected":""}}>2000</option>
                          <option value="2001" {{old('year')=="2001"?"selected":""}}>2001</option>
                          <option value="2002" {{old('year')=="2002"?"selected":""}}>2002</option>
                          <option value="2003" {{old('year')=="2003"?"selected":""}}>2003</option>
                          <option value="2004" {{old('year')=="2004"?"selected":""}}>2004</option>
                          <option value="2005" {{old('year')=="2005"?"selected":""}}>2005</option>
                          <option value="2006" {{old('year')=="2006"?"selected":""}}>2006</option>
                          <option value="2007" {{old('year')=="2007"?"selected":""}}>2007</option>
                          <option value="2008" {{old('year')=="2008"?"selected":""}}>2008</option>
                          <option value="2009" {{old('year')=="2009"?"selected":""}}>2009</option>
                          <option value="2010" {{old('year')=="2010"?"selected":""}}>2010</option>
                          <option value="2011" {{old('year')=="2011"?"selected":""}}>2011</option>
                          <option value="2012" {{old('year')=="2012"?"selected":""}}>2012</option>
                          <option value="2013" {{old('year')=="2013"?"selected":""}}>2013</option>
                          <option value="2014" {{old('year')=="2014"?"selected":""}}>2014</option>
                          <option value="2015" {{old('year')=="2015"?"selected":""}}>2015</option>
                          <option value="2016" {{old('year')=="2016"?"selected":""}}>2016</option>
                          <option value="2017" {{old('year')=="2017"?"selected":""}}>2017</option>
                          <option value="2018" {{old('year')=="2018"?"selected":""}}>2018</option>
                          <option value="2019" {{old('year')=="2019"?"selected":""}}>2019</option>
                          <option value="2020" {{old('year')=="2020"?"selected":""}}>2020</option>
                          <option value="2021" {{old('year')=="2021"?"selected":""}}>2021</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="name"><h5>6. ඔබගේ පාසල (English letters භාවිතා කරන්න)</h5></label>
                    <input type="text" name="school" id="school" class="form-control" value="{{ old('school') }}" required autocomplete="address-line">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col">
                    <label for="name"><h5>7. ස්ත්‍රී/පුරුෂ භාවය</h5></label><br>
                    <div class="row">
                      <div class="col text-center">
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" {{old('gender')=="Female"?"checked":""}} type="radio" name="gender" id="female" value="Female" checked>
                          <label class="form-check-label" for="female"> <h5>ස්ත්‍රී</h5></label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input" {{old('gender')=="Male"?"checked":""}} type="radio" name="gender" id="male" value="Male">
                          <label class="form-check-label" for="male"> <h5>පුරුෂ</h5></label>
                        </div>
                      </div>
                    </div>
                      
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-7">
                    <label for="telephone"><h5>8. ජංගම දුරකථන අංකය</h5></label>
                    <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}" required autocomplete="telephone">
                    <small id="telephone" class="form-text text-muted">(නිතර භාවිතා කරන දුරකථන අංකයක් ඇතුළත් කරන්න. Eg: 0771234567)</small>
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-7">
                    <label for="password"><h5>9. මුරපදය (Password)</h5></label>
                    <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}" required autocomplete="telephone">
                    <small class="form-text text-muted" id="password">(මෙම මුරපදය ඔබ විසින් දරුවාට පහසුවන පරිදි යොදා ගන්න මෙය හොඳින් මතක තබා ගත යුතු අතර එය දැමීමට පෙර හොඳින් නිරීක්ෂණය කරන්න.)</small>
                  </div>
                </div>
                <h5 class="text-right">ඉහත සියලුම තොරතුරු නිවැරදි ය.</h5>
                <p>සියලුම තොරතුරු නිවැරැදි බව පරික්ෂා කර මෙම ස්ථානයේ සහ Register me ස්ථානයේ click කරන්න.</p>
                <div class="form-check text-center">
                    <input type="checkbox" class="form-check-input" id="robot-test">
                    <label class="form-check-label" for="robot-test" required>I'm not a robot</label>
                </div>
                <div class="form-row">
                  <div class="form-group col text-right">
                    <button type="submit" class="btn btn-danger btn-lg">Register Me</button>
                  </div>
                </div>
              </form>
        </div>
        <div class="col">
            <img src="{{asset('images/register-cover.png')}}" class="img-fluid mx-auto d-block" alt="">
        </div>
    </div>
</div>
@endsection
@section('javascript')
  <script>
    function validate(){
      // Validate telephone
      telephone = $("#telephone").val();
      telephone = trim(telephone);
      if(telephone.length==10 && telephone.substring(0,1)=="0"){
          // Check robot-test
          if($('#robot-test').is(":checked")){
            return true;
          }
          else{
            alert("I'm not a robot සලකුණු කරන්න.");
            return false
          }
      }
      else{
        alert("දුරකථන අංක ආකෘතිය වැරදියි උදා: 0771234567");
        return false;
      }
      return false;
    }
  </script>
@endsection
