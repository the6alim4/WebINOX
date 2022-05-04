@extends('welcome')
@section('content')		
				<!--Featured Products-->
				<div class="well well-small" style="font-family:Display;padding-right:40px;padding-left:0px;">
                    <div >
                        <ul class="breadcrumb">
                        <li><a href="{{url('/trang-chu')}}">Trang chủ</a> <span class="divider">/</span></li>
                        <li class="active">Đánh giá sản phẩm</li>
                        </ul>
                      <h2 style="text-align: center;">Đánh giá của bạn về sản phẩm</h2>
					<hr class="soften" />
                    <input type="hidden" id="mand" value="{{$infor->MaNguoiDung}}">
                    <input type="hidden" id="mahdb" value="{{$infor->MaHDB}}">
					<div style="display:inline-block;width:70%;padding-left: 0;margin-left:15%;margin-right:10%;"> 
                        <div class="dssp1">                                   
                            <div class="sp" style="width: 350px;" >
                                <div class="thumbnail" style="width: 100%;">                                   
                                    @foreach($sp as $key)
                                    <div style="width: 100%;background: rgb(216, 237, 192);height:120px;padding:5%;">
                                        <span style="height: 100%;width: 100%;">
                                            <span style="width: 15%;height: 15%;float: left;">
                                                <img src="{{asset($key->Anh)}}">
                                            </span>&nbsp;&nbsp;
                                            <span style="width: 60%;text-align: end;float: left;">
                                                    <p style="text-align: left;">{{$key->TenSP}}</p>
                                            </span>
                                        </span>                                      
                                        
                                    </div>
                                    <br>
                                    @endforeach 
                                    <div class="box" style="font-size: 30px;display: flex;justify-content: center;align-items: center;direction: rtl;">
                                        <a class="ion-android-star b1" id="s1" onclick='b1()'></a>
                                        <a class="ion-android-star b2" id="s2" onclick='b2()'></a>
                                        <a class="ion-android-star b3" id="s3" onclick='b3()'></a>
                                        <a class="ion-android-star b4" id="s4" onclick='b4()'></a>
                                        <a class="ion-android-star b5" id="s5" onclick='b5()'></a>
                                        
                                    </div>
                                    <div>
                                        <p style="text-align:left; ">Viết bình luận của bạn:</p>
                                        <textarea id="binhluan" style="resize: none;width: 100%;" rows="6" required></textarea>
                                    </div>
                                    
                                </div>
                            </div>
                            <h4 style="text-align: center;margin-left:40%;margin-right: auto; "><a class="shopBtn" style="cursor: pointer;" onclick='sendEvaluate()'> Gửi đánh giá</a></h4>
                              
                        </div>
                                              

					</div>                    
				</div>
                </div>
            </div>
<script src="{{asset('public/frontend/js/jquery3x.js')}}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script src="{{asset('public/frontend/js/sweetalert.js')}}"></script>
<script type="text/javascript">  

function b1() {     
    $('#s1').css('color', '#f1c40f');
    $('#s2').css('color', '#f1c40f');
    $('#s3').css('color', '#f1c40f');
    $('#s4').css('color', '#f1c40f');
    $('#s5').css('color', '#f1c40f');         
}
function b2() {      
    $('#s1').css('color', '#ccc');
    $('#s2').css('color', '#f1c40f');
    $('#s3').css('color', '#f1c40f');
    $('#s4').css('color', '#f1c40f');
    $('#s5').css('color', '#f1c40f');        

}
function b3() {              
    $('#s1').css('color', '#ccc');
    $('#s2').css('color', '#ccc');
    $('#s3').css('color', '#f1c40f');
    $('#s4').css('color', '#f1c40f');
    $('#s5').css('color', '#f1c40f');
}
function b4() {              
    $('#s1').css('color', '#ccc');
    $('#s2').css('color', '#ccc');
    $('#s3').css('color', '#ccc');
    $('#s4').css('color', '#f1c40f');
    $('#s5').css('color', '#f1c40f');
}
function b5() {              
    $('#s1').css('color', '#ccc');
    $('#s2').css('color', '#ccc');
    $('#s3').css('color', '#ccc');
    $('#s4').css('color', '#ccc');
    $('#s5').css('color', '#f1c40f');
}
function sendEvaluate(){
    var sao=0;
    if($('#s1').css('color')=='rgb(241, 196, 15)') $sao=5
    if($('#s1').css('color')!='rgb(241, 196, 15)'&& $('#s2').css('color')=='rgb(241, 196, 15)') sao=4
    if($('#s2').css('color')!='rgb(241, 196, 15)' && $('#s3').css('color')=='rgb(241, 196, 15)') sao=3
    if($('#s3').css('color')!='rgb(241, 196, 15)'&& $('#s4').css('color')=='rgb(241, 196, 15)') sao=2
    if($('#s4').css('color')!='rgb(241, 196, 15)'&& $('#s5').css('color')=='rgb(241, 196, 15)') sao=1
    var bl=$('#binhluan').val()
    var mand=$('#mand').val()
    var mahdb=$('#mahdb').val()
    console.log(sao)
    console.log(bl)
    console.log(mand)
    console.log(mahdb)
    $.ajax({
    url:`../api/sendevaluate/?MaNguoiDung=${mand}&MaHDB=${mahdb}&Sao=${sao}&BinhLuan=${bl}`,
    method: 'GET',
    contentType: 'application/json',
    success:function(rs){
        swal({
                                title: "Cảm ơn bạn đã đánh giá sản phẩm!",
                                closeOnConfirm: true
                            },
                            function() {
                                window.location.href = "{{url('/da-hoan-thanh')}}";
                            });
    }
  });
}
</script>              
@endsection