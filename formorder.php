<div class="order-form" id="orderform">
    <div class="form">
        <form class="form-order-wa" action="order-progress.php" method="post">
            <div class="form__box mb-20">
                <label class="form__label">Masukan Nama</label>
                <input name="nama" type="text" class="form__input" placeholder="Nama Anda" required>
            </div>
            <div class="form__box mb-20">
                <label class="form__label">Nomer Whatsapp</label>
                <input name="whatsapp" type="number" class="form__input" placeholder="cth: 085123456789" pattern="[0-9]+" title="Hanya masukkan angka" required>
            </div>
            <div class="form__box mb-20">
                <input type="hidden" name="utm_source" value="<?php echo $utm_source?>">
                <input type="hidden" name="utm_medium" value="<?php echo $utm_medium?>">
                <input type="hidden" name="utm_content" value="<?php echo $utm_content?>">
                <input type="hidden" name="utm_campaign" value="<?php echo $utm_campaign?>">
                <input type="hidden" name="utm_gclid" value="<?php echo $utm_gclid?>">
                <input type="hidden" name="utm_term" value="<?php echo $utm_term?>">
                <input type="hidden" name="landing_page_url" value="<?php echo $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]?>">
            </div>
            
            <div class="button-area text-center mt-30 mb-3">
                <button type="submit" class="wa-contact-button"><span class="whatsapp-icon"></span> Pesan Harga Diskon</button>
            </div>
        </form>          
    </div>
</div>