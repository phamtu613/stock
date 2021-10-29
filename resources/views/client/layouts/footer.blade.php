<div class="container">
    <div class="row">
        <div class="col-md-4 info-company">
            <p class="company-name">{{ $footer->info_footer }}</p>
            <p class="info-contact"><span>Địa Chỉ:</span> <span>{{ $footer->address }}</span></p>
            <p class="info-contact"><span>Hotline/zalo:</span><span>{{ $infoStock->phone1 }}</span></p>
            <p class="info-contact"><span>Email:</span><span>{{ $infoStock->email }}</span></p>
        </div>
        <div class="col-md-4 list-tranner">
            <h3 class="footer-heading">Hội đồng Thành viên</h3>
            <div class="trainer">
                <img src="{{ url($footer->image_trainer1) }}" alt="{{ $footer->name_trainer1 }}">
                <div class="intro">
                    <p>{{ $footer->name_trainer1 }}</p>
                    <p>{{ $footer->desc_trainer1 }}</p>
                </div>
            </div>
            @if ($footer->image_trainer2)
                <div class="trainer">
                    <img src="{{ url($footer->image_trainer2) }}" alt="{{ $footer->name_trainer2 }}">
                    <div class="intro">
                        <p>{{ $footer->name_trainer2 }}</p>
                        <p>{{ $footer->desc_trainer2 }}</p>
                    </div>
                </div>
            @endif

            @if ($footer->image_trainer3)
                <div class="trainer">
                    <img src="{{ url($footer->image_trainer3) }}" alt="{{ $footer->name_trainer3 }}">
                    <div class="intro">
                        <p>{{ $footer->name_trainer3 }}</p>
                        <p>{{ $footer->desc_trainer3 }}</p>
                    </div>
                </div>
            @endif

            @if ($footer->image_trainer4)
                <div class="trainer">
                    <img src="{{ url($footer->image_trainer4) }}" alt="{{ $footer->name_trainer4 }}">
                    <div class="intro">
                        <p>{{ $footer->name_trainer4 }}</p>
                        <p>{{ $footer->desc_trainer4 }}</p>
                    </div>
                </div>
            @endif

        </div>
        <div class="col-md-4 socials">
            <h3 class="footer-heading">Fanpage</h3>
            <div class="text-center">
                {!! $footer->fanpage !!}
            </div>
        </div>
    </div>
</div>
<p class="text-center text-footer mt-3">Design by: <a href="https://izisoft.io/" class="text-white" target="t_blank">izi
        software</a></p>
