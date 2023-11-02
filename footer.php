<footer class="nbd-footer">
    <div class="nbd-footer__container">
        <div class="nbd-footer__menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu-one',
                    'container'       => 'nav',
                    'menu_class'      => 'nbd-footer__menu--items',
                )
            );
            ?>
            <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer-menu-two',
                        'container'       => 'nav',
                        'menu_class'      => 'nbd-footer__menu--items',
                    )
                );
            ?>
        </div>
        <section class="nbd-footer__offer">
            <div>            
                <h2>10% Off Your First Order</h2>
                <p>Subscribe to our mailing list for 10% off your order.</p>
            </div>
            <ul class="nbd-footer__payment-methods">
                <li>
                    <svg viewBox="0 0 780 500" width="54" height="34">
                        <use href="#visa"></use>
                    </svg>
                </li>
                <li>
                    <svg viewBox="0 0 780 500" width="54" height="34">
                        <use href="#mastercard"></use>
                    </svg>
                </li>
                <li>
                    <svg viewBox="0 0 780 500" width="54" height="34">
                        <use href="#dinners"></use>
                    </svg>
                </li>
                <li>
                    <svg viewBox="0 0 780 500" width="54" height="34">
                        <use href="#amex"></use>
                    </svg>
                </li>
            </ul>
        </section>
        <div>
            <section>
            <?php
                $custom_field_value = get_theme_mod('custom_field_setting');

                if ($custom_field_value) {
                    echo '<div class="custom-field-output">' . esc_html($custom_field_value) . '</div>';
                }
            ?>
            </section>
            <section>
                newsletter
            </section>
        </div>
    </div>
    <div class="nbd-footer__back-to-top">
        <p>
            Back to top 
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="m296-345-56-56 240-240 240 240-56 56-184-184-184 184Z"/></svg>
            </span>
        </p>
    </div>
</footer>
<div class="nbd-svg">
    <svg height="50" viewBox="0 0 78 50" width="78" xmlns="http://www.w3.org/2000/svg"><g fill="#393939" id="amex"><path d="m199.87 124.06-26.311 63.322-28.644-63.323h-35.722v88.379l-37.224-88.378h-32.517l-39.193 93.344h23.77l8.496-20.82h45.57l8.41 20.82h44.515v-73.171l31.819 73.171h19.218l31.735-73.106.083 73.106h22.435v-93.344zm-129.68 53.068h-29.875l14.896-37.213 14.979 37.211z"/><path d="m325.74 217.41h-73.12v-93.35h73.12v19.44h-51.23v16.83h50v19.13h-50v18.64h51.23z"/><path d="m428.82 149.2c0-10.412-4.152-16.5-11.076-20.669-7.076-4.17-15.316-4.471-26.502-4.471h-50.34v93.344h21.884v-33.952h23.495c7.88 0 12.755.713 15.952 3.996 3.982 4.491 3.455 12.569 3.455 18.186l.084 11.771h22.075v-18.338c0-8.336-.534-12.484-3.624-17.126-1.947-2.72-6.037-6.002-10.827-7.861 5.679-2.31 15.424-9.998 15.424-24.88zm-28.622 13.109c-3.007 1.861-6.564 1.923-10.826 1.923h-26.588v-20.734h26.95c3.813 0 7.795.176 10.378 1.685 2.84 1.36 4.597 4.253 4.597 8.251 0 4.08-1.672 7.363-4.511 8.875z"/><path d="m441.52 124.06h22.334v93.344h-22.334z"/><path d="m700.52 124.07v65.009l-38.474-65.009h-33.323v88.29l-37.056-88.29h-32.794l-30.847 73.407h-9.83c-5.761 0-11.884-1.121-15.253-4.813-4.068-4.711-6.02-11.922-6.02-21.922 0-9.785 2.562-17.213 6.293-21.144 4.344-4.318 8.854-5.53 16.842-5.53h20.743v-20h-21.189c-15.083 0-26.163 3.436-33.238 10.885-9.407 10-11.798 22.656-11.798 36.499 0 16.975 4 27.71 11.692 35.637 7.629 7.925 21.098 10.323 31.737 10.323h25.61l8.263-20.82h45.465l8.518 20.82h44.573v-70.059l41.485 70.059h31.016l.001.001v-93.342h-22.416zm-110.64 53.064h-30.209l15.062-37.213z"/><path d="m387.16 284.61h-69.936l-27.839 30.603-26.928-30.603h-88.027v93.366h86.693l28.007-30.909 26.951 30.908h42.54v-31.315h27.31c19.132 0 38.113-5.355 38.113-31.292-.001-25.857-19.516-30.758-36.884-30.758zm-137.12 73.909h-53.811v-18.577h48.049v-19.05h-48.049v-16.974h54.872l23.939 27.208zm86.78 10.966-33.603-38.032 33.603-36.823zm50.082-41.789h-28.285v-23.776h28.539c7.902 0 13.386 3.284 13.386 11.448.001 8.075-5.23 12.328-13.64 12.328z"/><path d="m534.57 284.61h73.05v19.31h-51.25v16.97h50v19.05h-50v18.58l51.25.08v19.38h-73.05z"/><path d="m506.92 334.59c5.761-2.331 15.511-9.936 15.513-24.838 0-10.652-4.344-16.479-11.252-20.734-7.183-3.906-15.253-4.404-26.334-4.404h-50.53v93.365h21.993v-34.1h23.389c7.985 0 12.861.799 16.059 4.144 4.067 4.342 3.537 12.658 3.537 18.276v11.681h21.973v-18.509c-.088-8.229-.535-12.484-3.625-17.043-1.87-2.719-5.852-6.006-10.723-7.838zm-13.218-11.619c-2.928 1.771-6.549 1.923-10.809 1.923h-26.588v-20.971h26.951c3.896 0 7.796.085 10.445 1.688 2.836 1.512 4.532 4.403 4.532 8.399.001 3.995-1.695 7.212-4.531 8.961z"/><path d="m691.2 328.73c4.262 4.496 6.547 10.173 6.547 19.782 0 20.086-12.312 29.461-34.383 29.461h-42.629v-20.021h42.457c4.152 0 7.096-.559 8.939-2.311 1.506-1.445 2.585-3.543 2.585-6.09 0-2.721-1.167-4.88-2.67-6.174-1.674-1.426-3.982-2.072-7.794-2.072-20.468-.713-46.101.646-46.101-28.9 0-13.542 8.347-27.796 31.292-27.796h43.877v19.872h-40.148c-3.98 0-6.568.151-8.77 1.686-2.396 1.513-3.286 3.757-3.286 6.718 0 3.522 2.035 5.92 4.789 6.954 2.309.818 4.79 1.059 8.519 1.059l11.78.324c11.884.295 20.039 2.391 24.996 7.508z"/><path d="m729.75 307.08c2.228-1.54 4.874-1.692 8.857-1.692h39.889v-261.75c0-23.553-18.586-42.638-41.512-42.638h-695.48c-22.917 0-41.512 19.089-41.512 42.638v124.31l26.505-62.085h57.077l7.351 15.422v-15.421h66.925l14.641 33.726 14.256-33.726h212.48c9.657 0 18.345 1.84 24.718 7.624v-7.624h58.159v7.624c10.018-5.611 22.417-7.625 36.524-7.625h84.278l7.819 15.422v-15.422h62.392l8.515 15.422v-15.421h60.804v130.58h-61.438l-11.611-19.753v19.753h-76.672l-8.327-20.795h-18.877l-8.515 20.795h-39.787c-15.612 0-27.478-3.767-35.106-7.947v7.947h-94.573v-29.631c0-4.182-.723-4.417-3.201-4.504h-3.537l.084 34.136h-182.86v-16.137l-6.568 16.202h-38.196l-6.568-15.965v15.898h-73.577l-8.41-20.795h-18.877l-8.432 20.795h-37.395v.001h-.003v223.92c0 23.553 18.585 42.637 41.512 42.637h695.48c22.917 0 41.512-19.089 41.512-42.638v-93.235l-.001.001v24.343c-8.77 4.331-20.294 6.022-32.095 6.022h-56.712v-8.361c-6.569 5.39-18.436 8.361-29.787 8.361h-178.79v-30.198c0-3.703-.357-3.854-3.979-3.854h-2.84v34.055h-58.854v-35.264c-9.852 4.354-21.019 4.744-30.486 4.594h-7.016v30.738l-71.355-.065-17.542-20.313-18.624 20.313h-115.76v-130.67h117.98l16.928 20 18.071-20h78.981c9.13 0 24.11.978 30.846 7.648v-7.648h70.57c6.632 0 21 1.368 29.515 7.648v-7.648h106.99v7.648c5.319-5.219 16.564-7.648 26.146-7.648h59.913v7.648c6.288-4.652 15.168-7.648 27.391-7.648h40.507v18.633h-43.596c-22.968 0-31.403 14.297-31.403 27.88 0 29.635 25.64 28.271 46.189 28.986 3.812 0 6.122.648 7.711 2.079 1.609 1.298 2.674 3.463 2.674 6.192.017 2.319-.924 4.538-2.588 6.107-1.76 1.758-4.681 2.317-8.857 2.317h-42.096v20.082h42.269c14.023 0 24.383-4.03 29.699-11.979v-.001h.001v-35.092c-.61-.803-1.145-1.604-2.03-2.318-4.872-5.131-12.861-7.235-24.831-7.537l-11.862-.324c-3.646 0-6.126-.242-8.435-1.062-2.836-1.039-4.785-3.443-4.785-6.975 0-2.971.888-5.221 3.197-6.737z"/></g></svg>
    <svg height="50" viewBox="0 0 78 50" width="78" xmlns="http://www.w3.org/2000/svg"><g id="dinners"><path d="m0 42.426c0-23.432 18.571-42.426 41.458-42.426h694.58c22.897 0 41.459 18.99 41.459 42.426v414.65c0 23.432-18.571 42.426-41.459 42.426h-694.58c-22.896 0-41.458-18.989-41.458-42.426v-414.65zm606.38 208.86c0-105.43-86.022-178.31-180.27-178.27h-81.11c-95.376-.035-173.88 72.862-173.88 178.27 0 96.432 78.504 175.66 173.88 175.2h81.111c94.247.462 180.27-78.789 180.27-175.2zm-261-163.66c-87.153.028-157.77 72.441-157.8 161.81.021 89.356 70.642 161.76 157.8 161.79 87.173-.027 157.81-72.434 157.82-161.79-.014-89.371-70.648-161.78-157.82-161.81zm-100.02 161.81c.082-43.672 26.69-80.913 64.211-95.711v191.4c-37.52-14.791-64.13-52.01-64.211-95.689zm135.82 95.733v-191.45c37.534 14.763 64.185 52.024 64.252 95.718-.067 43.707-26.718 80.941-64.252 95.732v.002z" fill="#393939"/></g></svg>
    <svg height="50" viewBox="0 0 78 50" width="78" xmlns="http://www.w3.org/2000/svg"><g id="mastercard" fill="#393939"><path d="m736.04 0h-694.58c-22.887 0-41.458 18.975-41.458 42.383v414.23c0 23.413 18.562 42.384 41.458 42.384h694.58c22.889 0 41.459-18.976 41.459-42.384v-414.23c0-23.412-18.562-42.383-41.459-42.383zm-217.94 465.4c-48.683 0-93.562-16.89-129.37-45.135-35.782 28.246-80.662 45.135-129.35 45.135-116.72 0-211.68-96.879-211.68-215.92 0-119.05 94.959-215.88 211.68-215.88 48.686 0 93.564 16.827 129.35 45.113 35.804-28.286 80.683-45.113 129.37-45.113 116.72 0 211.68 96.834 211.68 215.88-.001 119.04-94.966 215.92-211.68 215.92z"/><path d="m218.07 263.3c-2.088-.219-2.998-.303-4.431-.303-11.265 0-16.94 3.942-16.94 11.709 0 4.81 2.785 7.871 7.089 7.871 8.102 0 13.922-7.871 14.282-19.277z"/><path d="m549 263.3c-2.067-.219-2.994-.303-4.452-.303-11.244 0-16.939 3.942-16.939 11.709 0 4.81 2.786 7.871 7.134 7.871 8.079 0 13.922-7.871 14.257-19.277z"/><path d="m379.67 250.16c.127-1.596 2.087-13.805-9.177-13.805-6.286 0-10.799 4.939-12.611 13.805z"/><path d="m645.93 279.85c9.238 0 15.758-10.722 15.758-25.987 0-9.812-3.689-15.118-10.53-15.118-9.008 0-15.399 10.718-15.399 25.879-.001 10.112 3.421 15.226 10.171 15.226z"/><path d="m517.44 52.958c-42.883 0-82.473 14.363-114.46 38.6 29.009 27.599 50.462 63.438 60.712 103.83h-19.592c-10.039-35.707-29.662-67.233-55.864-91.495-26.173 24.262-45.811 55.787-55.811 91.495h-19.623c10.274-40.389 31.727-76.228 60.736-103.83-32.002-24.237-71.578-38.6-114.48-38.6-106.3 0-192.46 88.086-192.46 196.77 0 108.66 86.169 196.77 192.46 196.77 42.904 0 82.479-14.363 114.48-38.6-27.296-25.987-47.887-59.282-58.773-96.759h19.812c10.525 32.815 29.21 61.781 53.658 84.424 24.475-22.643 43.185-51.608 53.711-84.424h19.806c-10.903 37.479-31.491 70.771-58.772 96.759 31.983 24.236 71.573 38.6 114.46 38.6 106.29 0 192.46-88.114 192.46-196.77 0-108.69-86.171-196.77-192.46-196.77zm-371.49 244.71 11.371-72.89-25.376 72.89h-13.542l-1.667-72.457-11.937 72.457h-18.587l15.502-94.839h28.561l.802 58.698 19.261-58.698h30.82l-15.358 94.839zm92.476-40.927c-1.729 11.146-5.422 35.082-5.929 40.927h-16.454l.383-8c-5.023 6.317-11.71 9.34-20.798 9.34-10.781 0-18.12-8.604-18.12-21.049 0-18.806 12.801-29.737 34.824-29.737 2.257 0 5.146.215 8.1.603.613-2.566.761-3.644.761-5.025 0-5.088-3.441-7.007-12.722-7.007-9.701-.13-17.718 2.351-21.009 3.472.213-1.293 2.764-17.338 2.764-17.338 9.875-2.975 16.41-4.097 23.75-4.097 17.046 0 26.074 7.806 26.053 22.6.021 3.966-.612 8.861-1.603 15.311zm53.768-18.504c-5.021-.733-10.357-1.167-14.237-1.167-6.433 0-9.745 2.115-9.745 6.298 0 3.601.971 4.464 9.279 8.388 9.958 4.683 13.988 10.85 13.988 21.479 0 17.596-9.663 25.771-30.608 25.771-12.13-.35-16.137-1.293-20.672-2.285l2.741-17.813c6.351 2.109 11.878 3.017 17.784 3.017 7.867 0 11.412-2.156 11.412-6.94 0-3.52-1.245-4.639-9.282-8.52-10.507-5.068-15.104-11.773-15.104-21.543v-.001c-.085-14.254 7.593-26.093 29.804-26.093 4.537 0 12.32.69 17.468 1.51zm41.494.861h-10.184c-2.28 14.644-5.55 32.887-5.593 35.344 0 3.99 2.088 5.713 6.812 5.713 2.258 0 4.007-.256 5.336-.731l-2.611 17.082c-5.45 1.722-9.684 2.502-14.286 2.502-10.144 0-15.673-5.974-15.673-16.954-.124-3.405 1.478-12.353 2.744-20.57 1.118-7.182 8.583-52.571 8.583-52.571h19.726l-2.298 11.64h10.146zm61.975 26.634h-39.279c-1.329 11.146 5.677 15.806 17.154 15.806 7.063 0 13.416-1.468 20.501-4.83l-3.269 19.192c-6.792 2.116-13.335 3.107-20.25 3.107-22.111-.048-33.624-11.84-33.624-34.418 0-26.354 14.659-45.762 34.55-45.762 16.264 0 26.667 10.847 26.667 27.926 0 5.651-.737 11.15-2.45 18.979zm44.046-23.271c-11.116-1.164-12.823 8.045-19.934 55.204h-19.85l.909-5.193c3.438-23.896 7.866-48.069 10.359-71.921h18.222c.165 3.925-.696 7.743-1.183 11.711 6.06-9.121 10.737-13.953 19.03-12.182-2.449 4.27-5.76 12.699-7.553 22.381zm59.591 53.742c-7.299 2.068-12.045 2.805-17.528 2.805-21.366 0-34.684-15.744-34.684-40.929 0-33.903 18.396-57.579 44.703-57.579 8.667 0 18.899 3.753 21.81 4.916l-3.251 20.572c-7.087-3.667-12.233-5.135-17.74-5.135-14.825 0-25.189 14.645-25.189 35.538 0 14.386 6.964 23.098 18.501 23.098 4.902 0 10.299-1.57 16.859-4.872zm70.054-39.462c-1.708 11.146-5.416 35.082-5.927 40.927h-16.43l.379-8c-5.042 6.317-11.752 9.34-20.824 9.34-10.757 0-18.143-8.604-18.143-21.049 0-18.806 12.849-29.737 34.85-29.737 2.258 0 5.148.215 8.104.603.605-2.566.757-3.644.757-5.025 0-5.088-3.438-7.007-12.701-7.007-9.722-.13-17.715 2.351-21.009 3.472.189-1.293 2.744-17.338 2.744-17.338 9.892-2.975 16.43-4.097 23.729-4.097 17.065 0 26.098 7.806 26.073 22.6.043 3.966-.609 8.861-1.602 15.311zm23.923 40.924h-19.831l.909-5.193c3.438-23.896 7.848-48.069 10.336-71.921h18.227c.189 3.925-.677 7.743-1.16 11.711 6.052-9.121 10.696-13.953 19.022-12.182-2.487 4.27-5.78 12.699-7.551 22.381-11.115-1.164-12.842 8.045-19.952 55.204zm63.158 0 .946-7.178c-5.465 5.933-11.052 8.521-18.309 8.521-14.432 0-23.964-12.704-23.964-31.981 0-25.688 14.782-47.294 32.29-47.294 7.683 0 13.544 3.192 18.97 10.503l4.386-27.408h19.58l-15.11 94.837z"/></g></svg>
    <svg height="50" viewBox="0 0 78 50" width="78" xmlns="http://www.w3.org/2000/svg"><g id="visa" fill="#393939"><path d="m736.04 0h-694.58c-22.887 0-41.458 18.994-41.458 42.426v414.65c0 23.437 18.562 42.426 41.458 42.426h694.58c22.888 0 41.459-18.994 41.459-42.426v-414.65c0-23.436-18.562-42.426-41.459-42.426zm-581.62 353.64-49.177-180.32c-17.004-9.645-36.407-17.397-58.104-22.77l.706-4.319h89.196c12.015.457 21.727 4.38 25.075 17.527l19.392 95.393.004.011 5.77 28.77 54.155-141.57h58.594l-87.085 207.2-58.526.07zm188.7.177h-55.291l-.001-.001 34.585-207.61h55.315l-34.608 207.61zm96.259 3.08c-24.807-.26-48.697-5.28-61.618-11.075l7.764-46.475 7.126 3.299c18.167 7.751 29.929 10.897 52.068 10.897 15.899 0 32.957-6.357 33.094-20.272.103-9.088-7.136-15.577-28.666-25.753-20.982-9.932-48.777-26.572-48.47-56.403.328-40.355 38.829-68.514 93.487-68.514 21.445 0 38.618 4.514 49.577 8.72l-7.498 44.998-4.958-2.397c-10.209-4.205-23.312-8.24-41.399-7.954-21.655 0-31.678 9.229-31.678 17.858-.126 9.724 11.715 16.134 31.05 25.736 31.913 14.818 46.65 32.791 46.44 56.407-.428 43.094-38.174 70.928-96.319 70.928zm239.65-3.014s-5.074-23.841-6.729-31.108c-8.067 0-64.494-.09-70.842-.09-2.147 5.615-11.646 31.198-11.646 31.198h-58.086l82.151-190.26c5.815-13.519 15.724-17.216 28.967-17.216h42.742l44.772 207.48h-51.329z"/><path d="m617.38 280.22c4.574-11.963 22.038-58.036 22.038-58.036-.327.554 4.54-12.019 7.333-19.813l3.741 17.898s10.59 49.557 12.804 59.949h-45.917z"/></g></svg>
</div>
<?php wp_footer();?>
</body>
</html>