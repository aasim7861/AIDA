<?php
class NewsClass {
    public function displaynewsfeed(){
     $html = NULL;
     $entry_display = NULL;
      if ($_SESSION ["is_Admin"] == true) {
        $entry_display .= <<<ADMIN_OPTION
        <a href="newsAdd.php"><button class="btn btn-success">Add a New Article</button></a>
        <br/> <br/>
ADMIN_OPTION;
    }

  $entry_display .= <<<ENTRY_DISPLAY
          <ul class="thumbnails thumbnails-1">
ENTRY_DISPLAY;
        
        $query = 'SELECT * FROM News ORDER BY news_date';
        $result = mysql_query($query);

        if ($result !== false && mysql_num_rows($result) > 0) {
            while ($answer = mysql_fetch_assoc($result)) {
                $newsId = $answer['news_id'];
                $newsTitle = $answer['news_title'];
                $newsImage = $answer['news_image'];
                $newsImageCaption = $answer['news_img_caption'];
                
$entry_display .= <<<ENTRY_DISPLAY
  
             <li class="span3">
             <div class="thumbnail thumbnail-1">
             <h3 class="bg-danger"> <center> $newsTitle </center> </h3>   
             <img src="$newsImage" class="img-thumbnail" alt="" width="150" height="150"> 
             <section> <br />
             <center> <a href="newsDetail.php?NewsId=$newsId" class="btn btn-info"> Read More</a><br /> </center>
ENTRY_DISPLAY;

      if ($_SESSION ["is_Admin"] == true){
$entry_display .= <<<ADMIN_OPTION
             <a href=newsEdit.php?NewsId=$newsId><button class="btn btn-success">Edit Article</button></a>
             <a href=newsDelete.php?NewsId=$newsId><button class="btn btn-inverse">Delete Article</button></a> 
ADMIN_OPTION;
  }
$entry_display .= <<<ENTRY_DISPLAY
             </section>
             </div>
             </li>      
ENTRY_DISPLAY;
      } 
      $entry_display .= <<<ENTRY_DISPLAY
       </ul>
ENTRY_DISPLAY;
    } else {
        $entry_display = <<<ENTRY_DISPLAY
          <div class="right">
            <h2>This Page Is Under Construction</h2>
                <p>
                    No entries have been made on this page.
                    Please check back soon, or click the
                    link below to add an entry!
                </p>
           </div>
ENTRY_DISPLAY;
        }
        return $entry_display;                  
    }
    
public function display_newsadmin() {
  return <<<ADMIN_FORM
    <div class="right">
    <form action="{$_SERVER['PHP_SELF']}" enctype="multipart/form-data" method="post" id="validation" onsubmit="if(!confirm('Are you sure you want to add this item?')){return false;}">
        <table>
         <tbody>
            <tr>
              <td><label for="newsTitle"><b>News Title</b></label></td>
              <td><input name="newsTitle" id="newsTitle" type="text" maxlength="255" required class="required"/></td>
            </tr>
            <tr>
              <td><label for="newsBody"><b>News Body</b></label></td>
              <td><textarea name="newsBody" id="newsBody" required class="required"></textarea></td>
            </tr>
            <tr>
              <td><label for="newsImage"><b>News Image</b></label></td>
              <td><input name="newsImage" id="newsImage" type="file" class="required" /></td>
            </tr>
            <tr>
              <td><label for="newsImageCaption"><b>News Image Caption</b></label></td>
              <td><input name="newsImageCaption" id="newsImageCaption" type="text" maxlength="255" required class="required" /></td>
            </tr>
            <tr>
              <td><button class="btn btn-success" type="submit">Create News Article</button></td>
            </tr>
         </tbody>
       </table>
    </form>
    <a href="collection.php"><button class="btn btn-primary">Back</button></a>
    </div>
ADMIN_FORM;
    }
    
    public function newsSuccess(){
        echo "<div class='right'>";
        echo "News has been successfully updated.<br/><br/>";
        echo "<a href='collection.php'><button class='btn btn-success'>Go Back</button></a>";
        echo "</div>";
    }
    
    public function newsOperationFailed(){
        echo "<div class='right'>";
        echo "News Operation Failed.... Please try again.  ";
        echo "</div>";
}
    
      public function writeNews($post) {
        require_once 'FileUploadClass.php'; 
        $newsObj = new FileUploadClass();
        if ($post['newsTitle'])
            $newsTitle = mysql_real_escape_string($post['newsTitle']);
        if ($post['newsBody'])
            $newsBody = mysql_real_escape_string($post['newsBody']);
        
            $newsImage = $newsObj->getFileImageName();
        if ($post['newsImageCaption'])
            $newsImageCaption = mysql_real_escape_string($post['newsImageCaption']);
        if ($newsTitle && $newsBody && $newsImage && $newsImageCaption) {
            $created = date('Y-m-d H:i:s');
            $sql = "INSERT INTO News ( news_id, news_date, news_image, news_img_caption, news_title, news_body )
            VALUES('','$created','$newsImage','$newsImageCaption','$newsTitle','$newsBody')";
            
            echo "<div class='right'><p class='success'><b>News Feed</b> has been successfully added.</p></div>";
            return mysql_query($sql);
        } else {
            echo "<div class='right'><p class='error'><b>News Feed</b> has failed. Please check and try again.</p></div>";
            echo "failed";
            return false;
        }
    }
  }
?>