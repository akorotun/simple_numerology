<aside class="col-md-4 blog-sidebar">
    <div class="p-4 mb-3 bg-light border rounded shadow1">
        <h4 class="font-italic">Навіщо вам нумерологія?</h4>
        <p class="mb-0">Нумерологія допомагає розкрити приховані риси характеру людини та виявити всі її позитивні та
            негативні здібності, що сприяє кращому розумінню один одного, а також гармонізації стосунків у родині.</p>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Архів-block</h4>
        @if(count($articles_group) > 0)
            @foreach($articles_group as $el)
                <ol class="list-unstyled mb-0">

                <!-- <li><a href="/public/articles/{{ $el->month }}">{{ $el->month }}</a></li> -->
                    <li><a href="/public/archive/articles/{{ $el->month }}">
                            <?php
                            if (substr("$el->month", -2) == '01')
                                echo substr("$el->month", 0, 4) . ' ' . 'січень';
                            else if (substr("$el->month", -2) == '02')
                                echo substr("$el->month", 0, 4) . ' ' . 'лютий';
                            else if (substr("$el->month", -2) == '03')
                                echo substr("$el->month", 0, 4) . ' ' . 'березень';
                            else if (substr("$el->month", -2) == '04')
                                echo substr("$el->month", 0, 4) . ' ' . 'квітень';
                            else if (substr("$el->month", -2) == '05')
                                echo substr("$el->month", 0, 4) . ' ' . 'травень';
                            else if (substr("$el->month", -2) == '06')
                                echo substr("$el->month", 0, 4) . ' ' . 'червень';
                            else if (substr("$el->month", -2) == '07')
                                echo substr("$el->month", 0, 4) . ' ' . 'липень';
                            else if (substr("$el->month", -2) == '08')
                                echo substr("$el->month", 0, 4) . ' ' . 'серпень';
                            else if (substr("$el->month", -2) == '09')
                                echo substr("$el->month", 0, 4) . ' ' . 'вересень';
                            else if (substr("$el->month", -2) == '10')
                                echo substr("$el->month", 0, 4) . ' ' . 'жовтень';
                            else if (substr("$el->month", -2) == '11')
                                echo substr("$el->month", 0, 4) . ' ' . 'листопад';
                            else if (substr("$el->month", -2) == '12')
                                echo substr("$el->month", 0, 4) . ' ' . 'грудень';
                            ?>
                        </a></li>
                </ol>
            @endforeach
        @else <p>На даний час статті відсутні</p>
        @endif

    </div>

</aside><!-- /.blog-sidebar -->
