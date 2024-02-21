<?php /*echo'<?xml version="1.0" encoding="UTF-8" ?>'*/  ?>
<!-- <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">-->
    &lt;url&gt;
    </br>
        &lt;loc&gt;<?php echo SiteURL; ?>&lt;/loc&gt;
        </br>
        &lt;priority&gt; 1 &lt;/priority&gt;
        </br>
        &lt;changefreq>daily&lt;/changefreq&gt;
        </br>
    &lt;/url&gt;


   <!-- Categories -->
  
  
    <?php 
   

    
//     print_r($cat);
    foreach($cat['data'] as $catetogry) { ?>
    <p>
      &lt;url&gt;  
      </br>
        &lt;loc&gt;<?php echo SiteBase.'blogs/categories/'.$catetogry['cat_slug']; ?>&lt;/loc&gt;
        </br>
        &lt;priority&gt;0.5 &lt;/priority&gt;
        </br>
        &lt;changefreq>daily&lt;/changefreq&gt;
        </br>
      &lt;/url&gt;   
    </p>
    <?php 
    } ?>
  
  
  
   <!-- Tags -->
  
  
    <?php 
   
  // print_r($tags);
     
    foreach($tags['data'] as $tag) { ?>
    <p>
      &lt;url&gt;  
      </br> 
       &lt;loc&gt;<?php echo SiteBase.'blogs/tags/'.str_replace(" ","-",trim($tag['Tag_Name'])); ?>&lt;/loc&gt;
        </br>
        &lt;priority&gt;0.5 &lt;/priority&gt;
        </br>
        &lt;changefreq>daily&lt;/changefreq&gt;  
      </br>
      &lt;/url&gt;    
    </p>
    <?php 
    } ?>
  
  
  
  
    <!-- Blogs -->
  
  
    <?php 
    foreach($items['data'] as $item) { ?>
    <p>
      &lt;url&gt;  
      </br> 
        &lt;loc&gt;<?php echo SiteURL.$item['Slug']; ?>&lt;/loc&gt;
        </br>
        &lt;priority&gt;0.5 &lt;/priority&gt;
        </br>
        &lt;changefreq>daily&lt;/changefreq&gt;  
      </br>
      &lt;/url&gt;    
    </p>
    <?php 
    } ?>


</urlset>