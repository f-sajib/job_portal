<?php $user_id = $this->session->userdata("user_id");?>
<script type="text/javascript">
$(document).ready(function(){
    var user_id = '<?php echo $user_id;?>';
    $('#total_msg').hide();
$.ajax({
        data : {user_id:user_id},
        method : 'post',
        url : '<?php echo base_url('Welcome/notify');?>',
        success : function(data) {
            
              $('#total_msg').show();
              $('#total_msg').html(data);
              $('#total_msgs').html(data); 
                        
        }           
    });

});
function notify(id)
{   
    var url = '<?php echo base_url('Dashboard');?>';
   $.ajax({
        data : {id:id},
        method : 'post',
        url : '<?php echo base_url('Welcome/notify1');?>',
        success : function(data) {
                $("#view_messsage").html(data);
        }           
    });
    $('#total_msg').load('#total_msg');
    $("#message_boxs").load(" #message_box"); 
}  
</script>

<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-md-6 col-sm-8 clearfix">
            <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="search-box pull-left">
                <form action="#">
                    <input type="text" name="search" placeholder="Search..." required>
                    <i class="ti-search"></i>
                </form>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-md-6 col-sm-4 clearfix">
            <ul class="notification-area pull-right">
                <!-- <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li> -->
                <li class="dropdown">
                    <?php  
                    $data['message'] = $this->db->query("SELECT * FROM notification WHERE user_id=$user_id")->result();
                    $data['total'] = $this->db->query("SELECT * FROM notification WHERE user_id=$user_id AND reading=0")->result();
                        $total_msg = count($data['total']);
                    ?>
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span id="total_msg"></span>
                    </i>                    
                        <div class="dropdown-menu bell-notify-box notify-box">
                            <span class="notify-title">You have <span id="total_msgs"></span> new notifications 
                            <a href="#">view all</a></span>
                            <div id="message_boxs">
                                <?php if (isset($data['message']) && !empty($data['message'])):?>
                                <?php foreach($data['message'] as $row):?>                                    
                                <div onclick="notify(<?php echo $row->id?>)" style="border-bottom:1px solid white;
                                <?php if($row->reading=='0'){echo 'background:#c9c9f2';} 
                                      else {echo 'background:white';}?>" id="message_box" 
                                      class="nofity-list">
                                    <a data-toggle="modal" data-target="#myModal2" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-email btn-danger"></i></div>
                                        <div class="notify-text">
                                            <p><?php echo $row->message;?></p>
                                            <span><?php echo $row->date;?></span>                              
                                        </div>
                                    </a>                                                      
                                </div>                                
                                <?php endforeach;
                                    else: echo "<center style='padding:20px;'>No message recievd</center>";
                                    endif;?>
                            </div>                            
                        </div>                    
                </li>
               <!--  <li class="dropdown">
                    <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                    <div class="dropdown-menu notify-box nt-enveloper-box">
                        <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                        <div class="nofity-list">
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">When you can connect with me...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">I missed you so much...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img4.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Your product is completely Ready...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img2.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img1.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                            <a href="#" class="notify-item">
                                <div class="notify-thumb">
                                    <img src="assets/images/author/author-img3.jpg" alt="image">
                                </div>
                                <div class="notify-text">
                                    <p>Aglae Mayer</p>
                                    <span class="msg">Hey I am waiting for you...</span>
                                    <span>3:15 PM</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </li> -->
               <!--  <li class="settings-btn">
                    <i class="ti-settings"></i>
                </li> -->
            </ul>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" id="view_messsage">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  </div>
</div>
