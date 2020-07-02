<!DOCTYPE html>

 <html class="no-js">
<head>
    <?php include ('head.php'); ?>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" href="<?= base_url(); ?>asset/tagify/tagify.css">       
    <script src="<?= base_url(); ?>asset/tagify/tagify.js"></script>
<style>
    .tags {
  list-style: none;
  margin: 0;
  overflow: hidden; 
  padding: 0;
}

.tags li {
  float: left; 
}
.tags li a{
   text-decoration: none;
}

.tag {
  background: #eee;
  border-radius: 3px 0 0 3px;
  color: #999;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  padding: 0 20px 0 23px;
  position: relative;
  margin: 0 10px 10px 0;
  -webkit-transition: color 0.2s;
}


.tag::before {
  background: #fff;
  border-radius: 10px;
  box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
  content: '';
  height: 6px;
  left: 10px;
  position: absolute;
  width: 6px;
  top: 10px;
}

.tag::after {
  background: #fff;
  border-bottom: 13px solid transparent;
  border-left: 10px solid #eee;
  border-top: 13px solid transparent;
  content: '';
  position: absolute;
  right: 0;
  top: 0;
}

.tag:hover {
  background-color: lightgreen;
  color: white;
}

.tag:hover::after {
   border-left-color: lightgreen; 
}
</style>
</head>
<body>
<?php $page= 'job_sk'; include ('header.php'); ?>
    <div class="container">
        <br>
         <form>
            <section id='section-basic'>                
                <aside class='rightSide'>
                    <input name='tags' class='some_class_name' placeholder='write some tags'>
                </aside>
            </section>
        </form> 
        <?php if($user->num_rows() > 0)
            {
              foreach(array_slice($user->result(), 0, 6) as $row)
                { ?>

        <div class="col-sm-6">
            <br>
            <div style="border:1px solid #ccc" class="card">
                <div style="font-size: 25px; padding: 20px; border-bottom: 1px solid #f2f1ed" class="card-header">
                    <img height="90" width="90" src="<?= base_url(); ?>asset/img/<?php echo $row->photo;?>">
                    <?php echo $row->f_name.' '.$row->l_name; ?>
                </div>
                <div style="padding: 20px; font-size: 16px; color: #b0afab" class="card-body">
                    <?php echo $row->objective;?>
                </div> 
                <div style="padding: 20px;" class="card-footer">
                    <ul class="tags">
                        <?php 
                            $skills  = $row->skill;
                            $count= substr_count($skills,",");
                            $skill = explode(",", $skills);                    
                            for ($i=0; $i<$count+1; $i++) {
                        ?>
                        <li><a href="#" class="tag"><?php echo $skill[$i]; ?></a></li>
                        <?php }?>
                    </ul>
                </div>
            </div><br>
        </div>
        <?php } } ?>
    </div>

<script data-name="basic">
(function(){
    var input = document.querySelector('input[name=tags]'),
    tagify = new Tagify(input, {
        whitelist : ["A# .NET"],
        // blacklist : [".NET", "PHP"], 
    })
})()
</script>

<?php include ('footer.php'); ?>

<script>window.jQuery || document.write('<script src="<?= base_url(); ?>asset/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
<script src="<?= base_url(); ?>asset/js/bootstrap.min.js"></script>    
</body>

</html>