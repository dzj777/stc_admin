
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <title>电影</title>
    <!-- for-mobile-apps -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Movie Ticket Booking Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <!-- //for-mobile-apps -->
    <link href='//fonts.googleapis.com/css?family=Kotta+One' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href="{{asset('style/home/grab/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <script src="{{asset('style/home/grab/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('style/home/grab/js/jquery.seat-charts.js')}}"></script>
</head>
<body>
<div class="content">
    <h1>几号厅选票</h1>
    <div class="main">
        <h2>电影名称</h2>
        <div class="demo">
            <div id="seat-map">
                <div class="front">SCREEN</div>
            </div>
            <div class="booking-details">
                <ul class="book-left">
                    <li>电影名称 </li>
                    <li>开播时间 </li>
                    <li>票数</li>
                    <li>价格</li>
                    <li>Seats :</li>
                </ul>
                <ul class="book-right">
                    <li>: Gingerclown</li>
                    <li>: April 3, 21:00</li>
                    <li>: <span id="counter">0</span></li>
                    <li>: <b><i>$</i><span id="total">0</span></b></li>
                </ul>
                <div class="clear"></div>
                <ul id="selected-seats" class="scrollbar scrollbar1"></ul>


                <button class="checkout-button">立即购买</button>
                <div id="legend"></div>
            </div>
            <div style="clear:both"></div>
        </div>

        <script type="text/javascript">
            var price = 10; //price
            $(document).ready(function() {
                var $cart = $('#selected-seats'), //Sitting Area
                        $counter = $('#counter'), //Votes
                        $total = $('#total'); //Total money

                var sc = $('#seat-map').seatCharts({
                    map: [  //Seating chart
                        'aaaaaaaaaa',
                        'aaaaaaaaaa',
                        '__________',
                        'aaaaaaaa__',
                        'aaaaaaaaaa',
                        'aaaaaaaaaa',
                        'aaaaaaaaaa',
                        'aaaaaaaaaa',
                        'aaaaaaaaaa',
                        '__aaaaaa__'
                    ],
                    naming : {
                        top : false,
                        getLabel : function (character, row, column) {
                            return column;
                        }
                    },
                    legend : { //Definition legend
                        node : $('#legend'),
                        items : [
                            [ 'a', 'available',   '可选座' ],
                            [ 'a', 'unavailable', '已售出'],
                            [ 'a', 'selected', '选中']
                        ]
                    },
                    click: function () { //Click event
                        if (this.status() == 'available') { //optional seat
                            $('<li>'+(this.settings.row+1)+'排'+this.settings.label+'座</li>')
                                    .attr('id', 'cart-item-'+this.settings.id)
                                    .data('seatId', this.settings.id)
                                    .appendTo($cart);

                            $counter.text(sc.find('selected').length+1);
                            $total.text(recalculateTotal(sc)+price);

                            return 'selected';
                        } else if (this.status() == 'selected') { //Checked
                            //Update Number
                            $counter.text(sc.find('selected').length-1);
                            //update totalnum
                            $total.text(recalculateTotal(sc)-price);

                            //Delete reservation
                            $('#cart-item-'+this.settings.id).remove();
                            //optional
                            return 'available';
                        } else if (this.status() == 'unavailable') { //sold
                            return 'unavailable';
                        } else {
                            return this.style();
                        }
                    }
                });
                //sold seat
                sc.get(['1_2', '4_4','4_5','6_6','6_7','8_5','8_6','8_7','8_8', '10_1', '10_2']).status('unavailable');

            });
            //sum total money
            function recalculateTotal(sc) {
                var total = 0;
                sc.find('selected').each(function () {
                    total += price;
                });

                return total;
            }
        </script>
    </div>
    <p class="copy_rights">&copy; 2016 Movie Ticket Booking Widget. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> W3layouts</a></p>
</div>
<script src="{{asset('style/home/grab/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('style/home/grab/js/scripts.js')}}"></script>
</body>
</html>
