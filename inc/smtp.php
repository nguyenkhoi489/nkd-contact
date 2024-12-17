<div class="wrap nkd-contact">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <img src="<?= Plugin_URI . "image/icon.png" ?>" alt="">
                SMTP Config
            </h3>
        </div>
        <div class="card-body">
            <?php if (isset($_GET['settings-updated'])) { ?>
                <div id="message" class="updated">
                    <p><strong><?php _e('Settings saved.') ?></strong></p>
                </div>
            <?php } ?>

            <form method="post" action="options.php" novalidate="novalidate">
                <?php settings_fields('add_mailer_group'); ?>
                <table class="form-table" role="presentation">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="confg_emalNhan">Email nhận Form Liên hệ</label></th>
                            <td><input name="confg_emalNhan" type="text" id="confg_emalNhan" value="<?php echo get_option('confg_emalNhan'); ?>" placeholder="Ví dụ: admin@gmail.com" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_port">Config Port</label></th>
                            <td><input name="config_port" type="text" id="config_port" value="<?php echo get_option('config_port'); ?>" placeholder="Ví dụ: 465" class="regular-text"></td>
                        </tr>

                        <tr>
                            <th scope="row"><label for="config_mailer">Config Mailer</label></th>
                            <td><input name="config_mailer" type="text" id="config_mailer" value="<?php echo get_option('config_mailer'); ?>" placeholder="Ví dụ: smtp" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_host">Config Host</label></th>
                            <td><input name="config_host" type="text" id="config_host" value="<?php echo get_option('config_host'); ?>" placeholder="Ví dụ: smtp.gmail.com" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_SMTPAuth">Config SMTPAuth</label></th>
                            <td>
                                <select name="config_SMTPAuth" id="config_SMTPAuth">
                                    <option value="true" <?php selected(get_option('config_SMTPAuth'), 'true'); ?>>TRUE</option>
                                    <option value="false" <?php selected(get_option('config_SMTPAuth'), 'false'); ?>>FALSE</option>
                                </select>
                            </td>

                        </tr>
                        <tr>
                            <th scope="row"><label for="config_userName">User Name</label></th>
                            <td><input name="config_userName" type="text" id="config_userName" value="<?php echo get_option('config_userName'); ?>" placeholder="Tên tài khoản ..." class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_passWord">PassWord</label></th>
                            <td><input name="config_passWord" type="password" id="config_passWord" value="<?php echo get_option('config_passWord'); ?>" placeholder="Mật khẩu ..." class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_SMTPSecure">Config SMTPSecure</label></th>
                            <td><input name="config_SMTPSecure" type="text" id="config_SMTPSecure" value="<?php echo get_option('config_SMTPSecure'); ?>" placeholder="Ví dụ: SSL" class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_from">Config From</label></th>
                            <td><input name="config_from" type="text" id="config_from" value="<?php echo get_option('config_from'); ?>" placeholder="Địa chỉ hiển thị gửi từ..." class="regular-text"></td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="config_fromName">Config FromName</label></th>
                            <td><input name="config_fromName" type="text" id="config_fromName" value="<?php echo get_option('config_fromName'); ?>" placeholder="Tên hiển thị. Ví dụ: HG Aviation" class="regular-text"></td>
                        </tr>
                    </tbody>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    </div>
</div>