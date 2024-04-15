<div class="nbdc-settings">
    <button class="nbdc-settings__btn" aria-label="<?php echo __('Settings', 'nav-settings'); ?>" title="<?php echo __('Settings', 'nav-settings'); ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 24 24" xml:space="preserve">
            <use href="#settings"></use>
        </svg>
    </button>
    <div class="nbdc-settings__panel">
        <h3><?php echo __('Settings', 'nav-settings'); ?></h3>
        <span class="nbdc-settings__panel-close" title="<?php echo __('Close', 'nav-settings__close'); ?>">✕</span>
        <div class="nbdc-settings__language">
            <h4><?php echo __('Language', 'nav-settings__language'); ?></h4>
            <?php do_action('wpml_add_language_selector'); ?>
        </div>
        <div class="nbdc-settings__currency">
            <h4><?php echo __('Currency', 'nav-settings__currency'); ?></h4>
            <?php do_action('wcml_currency_switcher', array('format' => '%name% (%symbol%)')); ?>
        </div>
    </div>
</div>
