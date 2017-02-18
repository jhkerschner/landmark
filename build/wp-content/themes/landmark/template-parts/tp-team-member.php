<?php $staff_id = get_sub_field('team_member'); ?>
<div class="person">
    <h2 class="name"><?php echo get_the_title($staff_id); ?></h2>
    <?php if(get_field('title', $staff_id)) : ?>
    <p class="title"><?php the_field('title', $staff_id); ?></p>
    <?php endif; ?>
    <?php if(get_field('company', $staff_id)) : ?>
    <p class="company"><?php the_field('company', $staff_id); ?></p>
    <?php endif; ?>
    <?php if(get_field('email', $staff_id)) : ?>
    <p class="email"><a href="mailto:<?php echo antispambot(get_field('email', $staff_id)); ?>" data-event-category="CTA" data-event-action="Click" data-event-label="Mail To | <?php the_field('title', $staff_id); ?>"><?php echo antispambot(get_field('email', $staff_id)); ?></a></p>
    <?php endif; ?>
    <?php if(get_field('phone', $staff_id)) : ?>
    <p class="phone"><?php the_field('phone', $staff_id); ?></p>
    <?php endif; ?>
    <div class="wysiwyg">
      <?php //the_sub_field('bio'); ?>
    </div>
</div>