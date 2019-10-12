<div class="job-item col-md-12">
    <div class="row">
        <div class="item-img col-md-3">
            <img src="<?=get_the_post_thumbnail_url();?>" class="img-thumbnail"  alt="">
        </div>
        <div class="item-content col-md-8">
            <h2><?=get_the_title();?></h2>
            <strong><span class="amenities"><i class="fa fa-map-marker" aria-hidden="true"></i> :  Bangalor</span></strong>,
            <strong><span class="amenities">Salarry :  <i class="fa fa-inr" aria-hidden="true"></i> 10,000- <i class="fa fa-inr" aria-hidden="true"></i>40,000</strong> </span></strong>,
            <strong><span class="amenities">Job-Type : FullTime</span></strong>
            <p><?=wp_trim_words(get_the_content(), 50, '...' );?></p>
            <button><a href="<?=get_permalink();?>">Read More...</a></button>
        </div>
    </div>
</div>