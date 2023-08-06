@extends('layouts.frontt')
@section('content')
<div class="container-fluid">
    <!-- page 1 -->
   <div class="row">
       <div class="col-lg-12 col-12">
           <div class="banner-site">
               <div class="carousel-cell">
                   <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="banner site">
               </div>
               <div class="carousel-cell">
                   <img src="{{asset('img/wallhaven-4xl2pz.jpg')}}" alt="banner site">
               </div>
               <div class="carousel-cell">
                   <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="banner site">
               </div>
               <div class="carousel-cell">
                   <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="banner site">
               </div>
           </div>
       </div> 
   </div>

   <!-- page 2 -->
   <div class="row">
       <div class="col-lg-12 col-12">
           <div class="page2-row">
               <div class="col-lg-6 col-12">
                   <div class="content-p2w">
                       <h1>گروه درمانی اوستا</h1>
                       <p>گروه آموزشی- درمانی  متشکل از درمانگران با سابقه کار بیشتر از 5 سال و ویزیت بیش از 12 هزار بیمار دارای
                           اختلال بلع در بیمارستان‌های تهران، در سال 1399 تاسیس شده است. هدف اصلی ایجاد این گروه آگاه‌سازی مردم سرزمینمان ایران
                           در مورد اختلالات بلع، عواقب آن و ارائه خدمت به بیماران نیازمند دریافت خدمات گفتار درمانی است.
                       </p>
                       <a href="{{route('about')}}">
                           <svg width="41" height="36" viewBox="0 0 41 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                               <ellipse cx="8.76812" cy="10.25" rx="8.76812" ry="10.25" transform="matrix(5.1099e-08 -1 -1 -3.73919e-08 30.75 29.8408)" fill="#7E869E" fill-opacity="0.25"/>
                               <path d="M16.2292 18.8808L20.5001 22.5342M20.5001 22.5342L24.7709 18.8808M20.5001 22.5342L20.5001 7.92065" stroke="white" stroke-width="3" stroke-linecap="round"/>
                           </svg>
                           بیشتر بدانید
                        </a>
                   </div>

               </div>
               <div class="col-lg-6 col-12">
                   <div class="content-p2w-video">
                       <img src="{{asset('img/Screenshot 2022-05-18 at 00-37-28 صفحه اصلی - گفتار درمانی 1.png')}}" alt="">
                   </div>
               </div>
           </div>
       </div> 
   </div>
   <!-- page3  -->
   <div class="col-lg-12 col-12">
       <h2 class="head-p3">
           خدمات اوستا
       </h2>
   </div>
   <div class="container">
       <div class="row-p3">
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
           <div class="cellg">
               <div class="img-ads"><img src="{{asset('img/WilsonHealthServices-Naturopath-e1630443909241 1.png')}}" alt=""></div>
               <h4 class="title-ads">کمک به بلع درمانی</h4>
               <p class="p-ads">گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر ا</p>
           </div>
       </div>
       <button>
        <a href="{{route('appointment')}}" style="color: white;">
           <svg width="41" height="36" viewBox="0 0 41 36" fill="none" xmlns="http://www.w3.org/2000/svg">
               <ellipse cx="8.76812" cy="10.25" rx="8.76812" ry="10.25" transform="matrix(5.1099e-08 -1 -1 -3.73919e-08 30.75 29.8408)" fill="#7E869E" fill-opacity="0.25"/>
               <path d="M16.2292 18.8808L20.5001 22.5342M20.5001 22.5342L24.7709 18.8808M20.5001 22.5342L20.5001 7.92065" stroke="white" stroke-width="3" stroke-linecap="round"/>
           </svg>
           گرفتن وقت مشاوره
        </a>
       </button>
   </div>
   <!-- page 4 -->
   <div class="img-back-p4">
       <div class="col-lg-12 col-12">
           <h2 class="head-p4">
               دسترسی سریع
           </h2>
       </div>
       <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cell-p4">
                    <a href="{{route('procedure')}}">
                    <div class="svg-p4">
                        <svg width="95" height="87" viewBox="0 0 115 107" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="Done_ring_round">
                            <path id="Line 1" d="M43.1249 44.5837L61.5829 57.4641C61.9899 57.7481 62.5436 57.6907 62.8836 57.3291L95.8333 22.292" stroke="#28B0BD" stroke-width="11" stroke-linecap="round"/>
                            <path id="Ellipse 47" d="M100.625 53.5C100.625 61.8839 97.8025 70.0571 92.554 76.8719C87.3055 83.6867 79.8946 88.8007 71.3621 91.4956C62.8296 94.1905 53.6042 94.3309 44.9815 91.8972C36.3588 89.4635 28.772 84.5779 23.2866 77.9266C17.8013 71.2752 14.6929 63.1922 14.3981 54.8129C14.1033 46.4335 16.6368 38.1787 21.6429 31.2077C26.6489 24.2368 33.8761 18.9 42.3092 15.9468C50.7424 12.9936 59.9579 12.5723 68.6616 14.7422" stroke="#28B0BD" stroke-width="11" stroke-linecap="round"/>
                            </g>
                        </svg> 
                    </div></a><a href="{{route('procedure')}}">
                    <h4 class="h4-p4">ارزیابی انلاین</h4>
                </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6  col-12">
                <div class="cell-p4">
                    <a href="{{route('consultant')}}">
                    <div class="svg-p4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="118" height="101" viewBox="0 0 138 121" fill="none">
                            <g filter="url(#filter0_d_332_273)">
                              <path d="M111.124 29.1297C115 34.2162 115 41.297 115 55.4587C115 69.6203 115 76.7011 111.124 81.7877C109.446 83.9897 107.289 85.8803 104.778 87.3516C99.7103 90.3207 92.9068 90.696 80.5 90.7435V90.7503L74.1429 101.898C72.0239 105.614 65.976 105.614 63.857 101.898L57.5 90.7503V90.7435C45.0932 90.696 38.2897 90.3207 33.2219 87.3516C30.7105 85.8803 28.5542 83.9897 26.8762 81.7877C23 76.7011 23 69.6203 23 55.4587C23 41.297 23 34.2162 26.8762 29.1297C28.5542 26.9277 30.7105 25.037 33.2219 23.5657C39.023 20.167 47.0987 20.167 63.25 20.167H74.75C90.9013 20.167 98.977 20.167 104.778 23.5657C107.289 25.037 109.446 26.9277 111.124 29.1297Z" fill="#7E869E" fill-opacity="0.25" stroke="#28B0BD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M51.75 45.375L86.25 45.375" stroke="#28B0BD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                              <path d="M51.75 65.542H69" stroke="#28B0BD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                              <filter id="filter0_d_332_273" x="-4" y="0" width="146" height="129" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_332_273"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_332_273" result="shape"/>
                              </filter>
                            </defs>
                          </svg>
                    </div></a><a href="{{route('consultant')}}">
                    <h4 class="h4-p4">ثبت مشاوره رایگان</h4>
                </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="cell-p4">
                    <a href="{{route('appointment')}}">
                    <div class="svg-p4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="101" height="101" viewBox="0 0 121 121" fill="none">
                            <path d="M100.833 30.167C100.833 25.4529 100.833 23.0959 99.3688 21.6315C97.9044 20.167 95.5473 20.167 90.8333 20.167H30.1666C25.4526 20.167 23.0956 20.167 21.6311 21.6315C20.1666 23.0959 20.1666 25.4529 20.1666 30.167V98.8336C20.1666 99.7765 20.1666 100.248 20.4595 100.541C20.7524 100.834 21.2238 100.834 22.1666 100.834H90.8333C95.5473 100.834 97.9044 100.834 99.3688 99.3692C100.833 97.9047 100.833 95.5477 100.833 90.8336V30.167Z" fill="#7E869E" fill-opacity="0.25"/>
                            <path d="M42.8541 42.8545H78.1458" stroke="#28B0BD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M42.8541 57.9795H68.0625" stroke="#28B0BD" stroke-width="5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M93.2917 78.1462C93.2917 83.7265 88.7679 88.2503 83.1875 88.2503C77.6072 88.2503 73.0834 83.7265 73.0834 78.1462C73.0834 72.5658 77.6072 68.042 83.1875 68.042C88.7679 68.042 93.2917 72.5658 93.2917 78.1462Z" stroke="#28B0BD" stroke-width="5"/>
                            <path d="M95.7916 90.75L103.354 98.3125" stroke="#28B0BD" stroke-width="5" stroke-linecap="round"/>
                        </svg>
                    </div></a><a href="{{route('appointment')}}">
                    <h4 class="h4-p4">نوبت دهی آنلاین</h4>
                </a>
                </div>
            </div>
        </div>
       </div>

   </div>
   <!-- page 5 -->
   <div class="img-back-p5">    
       <div class="col-lg-5 col-12">
           <div class="title-personel-p5">
               <svg width="418" height="123" viewBox="0 0 418 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                   <g clip-path="url(#clip0_332_304)">
                   <path opacity="0.7" d="M80.6472 82.027C70.8204 77.1387 10.7174 86.0175 6.14678 84.7538C2.17038 83.0246 2.94737 48.3408 5.73543 43.0534C6.69525 41.1578 8.06643 40.792 11.4486 41.4572C15.6079 42.4549 71.1861 37.5664 83.1611 36.6354C84.1665 37.6662 86.4518 33.975 87.046 35.2719C87.9601 36.7683 115.384 35.6377 143.722 34.5404C154.142 34.1413 175.03 33.1105 206.109 32.5119C211.731 32.4121 207.299 34.4738 213.88 33.7423C227.911 32.1461 258.534 34.4406 269.184 32.8444C277.73 31.5807 279.559 31.5476 287.695 33.044C294.687 34.3408 340.301 34.8065 345.65 32.7446C346.929 32.1461 347.89 32.4453 347.797 33.2102C347.797 33.2102 378.969 35.804 379.06 36.4358C379.244 37.2006 380.112 37.6329 381.072 37.1675C382.717 36.3694 416.265 35.9702 416.538 38.2647C417.362 44.7492 409.637 71.4855 405.205 77.837C400.542 84.5542 380.661 75.1102 362.971 78.3026C275.263 73.6471 283.215 74.9771 266.852 77.0056C264.978 74.6446 257.437 80.1647 252.912 76.0081C251.085 74.3121 237.556 73.8133 234.539 75.4427C233.259 76.141 215.342 75.3098 196.877 75.1102C178.412 74.9106 159.352 75.4094 155.925 77.7039C141.573 73.6471 86.3605 81.4284 80.6472 82.027Z" fill="#E3E3E3"/>
                   <path opacity="0.7" d="M40.4694 79.7664C36.6301 77.4718 24.4266 81.7947 14.8285 83.8565C13.5487 84.1226 6.51001 85.3196 5.36737 84.7876C3.99619 83.7236 0.202618 44.8496 0.0655006 43.3865C-0.208735 40.327 0.385441 42.2891 1.71091 42.5218C2.4422 42.6549 5.41307 42.023 6.14436 41.8901C9.66371 40.9922 14.5085 39.0966 17.7536 37.7C18.622 38.5979 17.2966 35.1063 18.2106 36.2702C20.6331 39.3627 49.8391 25.6289 54.1355 23.9994C55.8723 23.3344 55.7351 25.5956 57.3806 24.1989C59.1174 22.7025 62.8652 21.5386 66.4303 20.408C79.822 16.085 73.469 13.8902 81.0104 14.5553C84.4841 14.6551 99.6583 9.06837 100.572 6.47458C100.71 5.74299 101.212 5.87601 101.578 6.60758C101.624 6.70735 104.595 6.14202 107.794 5.77624C110.993 5.41045 114.147 5.11117 114.33 5.37718C114.741 6.10878 115.244 6.37481 115.381 5.80949C115.427 4.81188 128.133 0.0565602 129.047 2.18482C131.652 8.30353 138.6 35.0398 139.834 41.5907C141.159 48.6406 132.109 41.491 128.773 46.7119C124.111 47.6098 115.747 49.5385 104.823 52.7308L101.121 56.5882C99.1099 54.6928 100.344 60.5788 96.3675 57.3199C94.7679 56.023 90.3802 57.0872 90.4715 58.9492C90.5172 59.6809 84.4841 60.9446 78.4052 62.8069C72.3263 64.6358 66.2018 66.9635 66.4303 69.3911C60.26 67.4955 48.4679 75.6427 40.4694 79.7664Z" fill="#E3E3E3"/>
                   <path opacity="0.7" d="M140.747 113.486C131.606 109.263 83.4324 122.299 78.8617 121.301C75.2053 119.838 68.8522 85.5529 70.132 80.1657C70.589 78.237 71.6403 77.7716 74.6112 78.2039C78.3133 78.9022 119.768 70.9877 133.892 68.3938C134.943 69.3582 136.131 65.5341 136.908 66.7645C138.508 68.8928 218.951 56.6219 235.861 54.6268C240.523 54.0613 237.232 56.4557 242.58 55.1588C253.915 52.3655 279.83 51.8335 288.332 49.2396C295.187 47.1446 296.65 47.0448 303.734 47.6767C310.911 48.3085 347.703 43.9521 351.542 41.3584C352.457 40.6268 353.279 40.8264 353.416 41.5911C353.416 41.5911 379.652 40.7266 379.834 41.2253C380.108 41.9903 381.022 42.2895 381.662 41.7243C382.896 40.8264 410.092 36.2706 410.914 38.4653C413.2 44.7503 413.565 71.9852 411.462 78.7691C409.223 85.9852 390.026 79.2014 376.269 84.3559C297.382 90.0754 312.601 88.5458 295.599 93.168C293.541 91.0066 288.423 97.1917 283.76 93.5005C281.886 92.0043 270.506 92.7357 268.266 94.6644C267.353 95.4626 252.177 96.2607 236.683 97.6242C221.189 99.0208 205.375 101.016 202.953 103.577C191.48 100.783 150.208 111.125 140.747 113.486Z" fill="#E3E3E3"/>
                   </g>
                   <defs>
                   <clipPath id="clip0_332_304">
                   <rect width="418" height="123" fill="white"/>
                   </clipPath>
                   </defs>
               </svg>
               <h3>اعضای تیم اوستا</h3>
               <p>گروه آموزشی- درمانی Iran-Med-SLP متشکل از درمانگران با سابقه کار بیشتر از 5 سال و ویزیت بیش از 12 هزار بیمار
                   دارای
                   اختلال بلع در بیمارستان‌های تهران، در سال 1399 تاسیس شده است. هدف اصلی ایجاد این گروه آگاه‌سازی مردم
                   سرزمینمان ایران
                   در مورد اختلالات بلع، عواقب آن و ارائه خدمت به بیماران نیازمند دریافت خدمات گفتار درمانی است.
               </p>
               <button>
                <a href="{{route('team')}}" style="color: white;">
                   <svg width="41" height="36" viewBox="0 0 41 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <ellipse cx="8.76812" cy="10.25" rx="8.76812" ry="10.25"
                           transform="matrix(5.1099e-08 -1 -1 -3.73919e-08 30.75 29.8408)" fill="#7E869E"
                           fill-opacity="0.25" />
                       <path
                           d="M16.2292 18.8808L20.5001 22.5342M20.5001 22.5342L24.7709 18.8808M20.5001 22.5342L20.5001 7.92065"
                           stroke="white" stroke-width="3" stroke-linecap="round" />
                   </svg>
                   مشاهده تمامی اعضا
                </a>
               </button>
           </div>
       </div>
       <div class="col-lg-1">
           <svg xmlns="http://www.w3.org/2000/svg" width="92" height="27" viewBox="0 0 92 27" fill="none" style="    position: relative; left: -42px; top: -31px;">
               <mask id="mask0_332_288" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="92" height="27">
               <path d="M0.799728 26.127L91.3945 26.127V0.995363L0.799728 0.995363V26.127Z" fill="white"/>
               </mask>
               <g mask="url(#mask0_332_288)">
               <path d="M11.6643 13.5465L17.1788 26.0669C16.0337 26.2663 14.8544 26.1085 13.8041 25.6133C12.7538 25.118 11.8844 24.3121 11.3164 23.3047C7.75116 18.0544 4.5023 12.5986 1.58678 6.96719C-0.561715 2.57042 1.83232 0.274761 6.85575 1.19977C11.0402 1.98087 15.2144 2.84435 19.4296 3.41306C21.4757 3.68699 23.6242 3.25029 25.7113 3.33167C26.6952 3.48551 27.6547 3.76538 28.5658 4.16437C28.0542 5.23031 27.8087 6.86496 26.98 7.21035C25.2904 7.79096 23.5271 8.13239 21.7417 8.22569C20.8107 8.34777 19.8593 8.33783 17.6494 8.45991C19.6342 9.64793 20.5652 10.5412 21.6599 10.8052C28.3305 12.4398 34.9601 14.532 41.733 15.3538C56.9668 17.1919 72.1904 17.2832 86.9434 12.0031C87.6973 11.6617 88.5189 11.492 89.3477 11.5059C89.7287 11.5426 90.0977 11.6578 90.4309 11.8453C90.764 12.0319 91.0537 12.287 91.2813 12.5927C91.3966 12.9569 91.4177 13.344 91.3426 13.7182C91.2674 14.0924 91.0987 14.4417 90.8516 14.7345C89.542 15.9493 88.0105 16.9041 86.3398 17.5472C81.6541 19.035 76.8675 20.1883 72.0165 21.0002C56.2431 23.3673 40.148 22.4929 24.7292 18.4306C20.4936 17.2941 16.4728 15.3647 11.6643 13.5465Z" fill="#D8F6FF"/>
               <path d="M80.2262 10.4092C78.7384 10.9838 75.2981 12.1103 73.4396 12.02" stroke="#B6C9D9" stroke-width="2.06023" stroke-linecap="round"/>
               </g>
           </svg>
       </div>
       
       <div class="col-lg-6 col-12">
           <div class="personel-p5">
               <div class="personel-cell">
                   <div class="personel"> 
                       <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="">
                       <a href="#">
                           <div class="title-personel">
                               <h5>موید سلمانی</h5>
                               <p>درمانگر</p>
                           </div>
                       </a>
                   </div>
                   <div class="personel">
                       <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="">
                       <a href="#">
                           <div class="title-personel">
                               <h5>موید سلمانی</h5>
                               <p>درمانگر</p>
                           </div>
                       </a>
                   </div>
               </div>
               <div class="personel-cell">
                   <div class="personel">
                       <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="">
                       <a href="#">
                           <div class="title-personel">
                               <h5>موید سلمانی</h5>
                               <p>درمانگر</p>
                           </div>
                       </a>
                   </div>
                   <div class="personel">
                       <img src="{{asset('img/blue-banner-background-with-copy-space- 1.png')}}" alt="">
                       <a href="#">
                           <div class="title-personel">
                               <h5>موید سلمانی</h5>
                               <p>درمانگر</p>
                           </div>
                       </a>
                   </div>
               </div>
           </div>
       </div>
       <div class="col-lg-12 col-12">
           <div class="banner-p5">
               <div class="carousel-cell">
                   <img src="{{asset('img/image 32.png')}}" alt="">
               </div>
               <div class="carousel-cell">
                   <img src="{{asset('img/image 33.png')}}" alt="">
               </div>
               <div class="carousel-cell">
                   <img src="{{asset('img/image 34.png')}}" alt="">
               </div>
           </div>
       </div>
   </div>
   <!-- page 6 -->
   <div class="row">
       <div class="row-p6">
           <div class="col-lg-12 col-12">
               <div class="header-p6">
                   <svg width="418" height="123" viewBox="0 0 418 123" fill="none" xmlns="http://www.w3.org/2000/svg">
                       <g clip-path="url(#clip0_332_304)">
                       <path opacity="0.7" d="M80.6472 82.027C70.8204 77.1387 10.7174 86.0175 6.14678 84.7538C2.17038 83.0246 2.94737 48.3408 5.73543 43.0534C6.69525 41.1578 8.06643 40.792 11.4486 41.4572C15.6079 42.4549 71.1861 37.5664 83.1611 36.6354C84.1665 37.6662 86.4518 33.975 87.046 35.2719C87.9601 36.7683 115.384 35.6377 143.722 34.5404C154.142 34.1413 175.03 33.1105 206.109 32.5119C211.731 32.4121 207.299 34.4738 213.88 33.7423C227.911 32.1461 258.534 34.4406 269.184 32.8444C277.73 31.5807 279.559 31.5476 287.695 33.044C294.687 34.3408 340.301 34.8065 345.65 32.7446C346.929 32.1461 347.89 32.4453 347.797 33.2102C347.797 33.2102 378.969 35.804 379.06 36.4358C379.244 37.2006 380.112 37.6329 381.072 37.1675C382.717 36.3694 416.265 35.9702 416.538 38.2647C417.362 44.7492 409.637 71.4855 405.205 77.837C400.542 84.5542 380.661 75.1102 362.971 78.3026C275.263 73.6471 283.215 74.9771 266.852 77.0056C264.978 74.6446 257.437 80.1647 252.912 76.0081C251.085 74.3121 237.556 73.8133 234.539 75.4427C233.259 76.141 215.342 75.3098 196.877 75.1102C178.412 74.9106 159.352 75.4094 155.925 77.7039C141.573 73.6471 86.3605 81.4284 80.6472 82.027Z" fill="#E3E3E3"/>
                       <path opacity="0.7" d="M40.4694 79.7664C36.6301 77.4718 24.4266 81.7947 14.8285 83.8565C13.5487 84.1226 6.51001 85.3196 5.36737 84.7876C3.99619 83.7236 0.202618 44.8496 0.0655006 43.3865C-0.208735 40.327 0.385441 42.2891 1.71091 42.5218C2.4422 42.6549 5.41307 42.023 6.14436 41.8901C9.66371 40.9922 14.5085 39.0966 17.7536 37.7C18.622 38.5979 17.2966 35.1063 18.2106 36.2702C20.6331 39.3627 49.8391 25.6289 54.1355 23.9994C55.8723 23.3344 55.7351 25.5956 57.3806 24.1989C59.1174 22.7025 62.8652 21.5386 66.4303 20.408C79.822 16.085 73.469 13.8902 81.0104 14.5553C84.4841 14.6551 99.6583 9.06837 100.572 6.47458C100.71 5.74299 101.212 5.87601 101.578 6.60758C101.624 6.70735 104.595 6.14202 107.794 5.77624C110.993 5.41045 114.147 5.11117 114.33 5.37718C114.741 6.10878 115.244 6.37481 115.381 5.80949C115.427 4.81188 128.133 0.0565602 129.047 2.18482C131.652 8.30353 138.6 35.0398 139.834 41.5907C141.159 48.6406 132.109 41.491 128.773 46.7119C124.111 47.6098 115.747 49.5385 104.823 52.7308L101.121 56.5882C99.1099 54.6928 100.344 60.5788 96.3675 57.3199C94.7679 56.023 90.3802 57.0872 90.4715 58.9492C90.5172 59.6809 84.4841 60.9446 78.4052 62.8069C72.3263 64.6358 66.2018 66.9635 66.4303 69.3911C60.26 67.4955 48.4679 75.6427 40.4694 79.7664Z" fill="#E3E3E3"/>
                       <path opacity="0.7" d="M140.747 113.486C131.606 109.263 83.4324 122.299 78.8617 121.301C75.2053 119.838 68.8522 85.5529 70.132 80.1657C70.589 78.237 71.6403 77.7716 74.6112 78.2039C78.3133 78.9022 119.768 70.9877 133.892 68.3938C134.943 69.3582 136.131 65.5341 136.908 66.7645C138.508 68.8928 218.951 56.6219 235.861 54.6268C240.523 54.0613 237.232 56.4557 242.58 55.1588C253.915 52.3655 279.83 51.8335 288.332 49.2396C295.187 47.1446 296.65 47.0448 303.734 47.6767C310.911 48.3085 347.703 43.9521 351.542 41.3584C352.457 40.6268 353.279 40.8264 353.416 41.5911C353.416 41.5911 379.652 40.7266 379.834 41.2253C380.108 41.9903 381.022 42.2895 381.662 41.7243C382.896 40.8264 410.092 36.2706 410.914 38.4653C413.2 44.7503 413.565 71.9852 411.462 78.7691C409.223 85.9852 390.026 79.2014 376.269 84.3559C297.382 90.0754 312.601 88.5458 295.599 93.168C293.541 91.0066 288.423 97.1917 283.76 93.5005C281.886 92.0043 270.506 92.7357 268.266 94.6644C267.353 95.4626 252.177 96.2607 236.683 97.6242C221.189 99.0208 205.375 101.016 202.953 103.577C191.48 100.783 150.208 111.125 140.747 113.486Z" fill="#E3E3E3"/>
                       </g>
                       <defs>
                       <clipPath id="clip0_332_304">
                       <rect width="418" height="123" fill="white"/>
                       </clipPath>
                       </defs>
                   </svg>
                   <h3 class="head-p6">جدید ترین های اوستا</h3>
               </div>
           </div>
           <div class="col-lg-12 col-12">
               <!-- slide bar  Advertising-->
               <div class="Advertising-p6 ">
                   <!-- inside Advertising -->
                   @foreach($posts->take(15) as $item) 
             
                   <div class="carousel-cell-Advertising"> 
                       <div class="roww-1">
                           <img src="{{ asset('images/'.$item['pic'].'/'.$item['pic'] ) }}" alt="{{$item->title}}">
                       </div>
                       <div class="roww-2">
                           
                       </div>
                       <div class="roww-3">
                           <a href="{{route('single',['id'=>$item->slug])}}"><h4>{!! \Illuminate\Support\Str::limit($item->title, 50, ' ...') !!}</h4></a>
                       </div>
                       <div class="roww-4">
                           <a href="{{route('single',['id'=>$item->slug])}}"><p>{!! \Illuminate\Support\Str::limit($item->explain, 100, ' ...') !!}</p></a>
                       </div>
                       <div class="roww-5">
                           <div class="lg2">
                                @if($item->writer == 'مهرداد خلیلی')
                                    <img src="{{asset('images/khalili.jpeg')}}" class="rounded-circle" width="304" height="304" alt="author">
                                @endif
                                
                                @if($item->writer == 'نرگس خاکباز')
                                    <img src="{{asset('images/khakbaz.jpeg')}}" class="rounded-circle" width="304" height="304" alt="author">
                                @endif
                                
                                @if($item->writer == 'شیما حسین آبادی')
                                    <img src="{{asset('images/hoseinabadi.jpeg')}}" class="rounded-circle" width="304" height="304" alt="author">
                                @endif
                                
                                @if($item->writer == 'سیما اعتباری')
                                    <img src="{{asset('images/etebari.jpeg')}}" class="rounded-circle" width="304" height="304" alt="author">
                                @endif
                                @if($item->writer == 'موید سلمانی')
                                    <img src="{{asset('images/avatar/01.jpg')}}" class="rounded-circle" width="304" height="304" alt="author">
                                @endif    
                               <p>{{$item->writer}}</p>
                           </div>
                           <div class="lg4">
                               <p>{!! Facades\Verta::instance($item->created_at)->formatDate() !!}</p>
                           </div>
                       </div>
                   </div>
                   @endforeach 
                   <!-- end one cell Advertising -->

                </div>
           </div>
       </div>
   </div>
   <div class="row">
       <div class="col-lg-12 col-12">
           <div id="contentFull" class="main-blog-Ma" style="height: 200px; overflow: hidden;">
               <p>
                   ا
                   فوتبال نداشته باشید و از تکنیک&zwnj;&zwnj;&zwnj;ها و قوانین این بازی سر در
                   نیاورید، باز هم به&zwnj;خوبی می&zwnj;دانید که تیم استقلال سال&zwnj;هاست که
                   عنوان سرسخت&zwnj;ترین و اصلی&zwnj;ترین رقیب پرسپولیس را به خود اختصاص داده
                   است.
                   سال&zwnj;هاست که این دو تیم بر سر قهرمانی با یکدیگر رقابت می&zwnj;کنند و
                   علاقه&zwnj;مندانشان هم حسابی برای هم شاخ و شانه می&zwnj;کشند. پرچم،
                   کیت&zwnj;&zwnj;های ورزشی و لوگوی استقلال و پرسپولیس در جای&zwnj;جای زندگی
                   عاشقان این تیم&zwnj;ها پیدا می&zwnj;شود و این افراد راهی برای نشان دادن
                   تعلق خاطر خود به تیم محبوب&zwnj;شان پیدا می&zwnj;کنند.
                   قطعا استفاده از لوگو یکی از بهترین راه&zwnj;های نمایش وفاداری و توجه
                   به تیمی است که شما به آن علاقه دارید. شما می&zwnj;توانید لوگوها را در
                   هر مکانی استفاده کنید: روی ماگ&zwnj; یا به عنوان پس&zwnj;زمینه&zwnj;ی گوشی،
                   به&zwnj;عنوان طرحی روی لباس یا به شکل یک پوستر روی دیوار. به هر حال
                   فرقی نمی&zwnj;کند، اگر طرفدار استقلال هستید، می&zwnj;توانید لوگوی جالب آن
                   را به هر شکلی که می&zwnj;خواهید استفاده کنید و طرفداری خود را نشان
                   دهید.
                   اما آیا به عنوان یک هوادار با تاریخچه لوگو استقلال آشنایی دارید؟
                   یا می&zwnj;دانید این لوگو چه مفاهیمی را در خود جای داده است؟ در این
                   مطلب به بررسی تاریخچه لوگو استقلال، سیرتحول این لوگو و مفاهیم
                   پنهان شده در تار و پود آن می&zwnj;پردازیم تا به عنوان یک طرفدار درک
                   بهتری از لوگوی این تیم موفق و محبوب پیدا کنیم.
               </p>


                   <p>
                       سیر تکامل لوگو استقلال
                       اگر تاریخچه لوگو استقلال را بررسی کنید، متوجه می&zwnj;شوید که
                       لوگوی
                       این برند برخلاف لوگو پرسپولیس تغییرات چندان
                       زیاد و گسترده&zwnj;ای نداشته و در طول سال&zwnj;ها تنها ۶ بار دستخوش
                       تغییر
                       شده است. همانطور که در بخش قبل اشاره کردیم،
                       تیم استقلال کنونی که فعالیت خود را با عنوان کلوب
                       دوچرخه&zwnj;سواران
                       آغاز کرده بود، از تصویر یک دوچرخه&zwnj;سوار در
                       کادری سپر مانند به&zwnj;عنوان لوگو استفاده کرد.
                       ۴ سال بعد، در سال ۱۳۲۸ و با تغییر مالکیت و نام کلوب
                       دوچرخه&zwnj;سواران، باشگاه نیز با یک تغییر اساسی در لوگو،
                       سنخیت آن را با نام باشگاه افزایش داد. این بار به جای
                       دوچرخه&zwnj;سوار
                       تصویر یک تاج سلطنتی که شباهت بسیار زیادی به
                       تاج پهلوی داشت، در میان ۴ حلقه&zwnj;&zwnj;ی المپیک خودنمایی می&zwnj;کرد.
                       در حلقه&zwnj;های کناری تاج حروف تا و ج به رنگ طلایی نوشته شده بود
                       و
                       در زیر حلقه&zwnj;ها واژه&zwnj;ی تاج با حروف لاتین و به
                       رنگ آبی به چشم می&zwnj;خورد. گفته می&zwnj;شود که حلقه&zwnj;های به کار رفته
                       در
                       این لوگو یادآور چرخ&zwnj;های دوچرخه و نوعی ادای
                       دین به نام و لوگوی پیشین این باشگاه بوده&zwnj;اند.
                       با پیروزی انقلاب و درگیری&zwnj;ها بر سر انحلال باشگاه تاج، این
                       باشگاه
                       با همت چند تن از بازیکنان و با تغییر نام به
                       استقلال پابرجا باقی ماند، اما لوگوی شاهنشاهی تیم تاج با حال
                       و
                       هوای جدید کشور هم&zwnj;خوانی نداشت. به همین خاطر
                       باید لوگوی تیم نیز به&zwnj;دنبال نام آن تغییر می&zwnj;کرد.
                       لوگوی جدید در سال ۱۳۶۲ طراحی شد و به جز استفاده از رنگ&zwnj;های
                       آبی و
                       سفید در ساختار اصلی شباهت دیگری به لوگوهای
                       پیشین این تیم نداشت. در این لوگوی جدید نام استقلال و پنج
                       ضلعی&zwnj;های آبی و سفیدی که تصویر توپ چهل تکه را تداعی
                       می&zwnj;کردند در یک دایره قرار گرفته بودند.
                       دایره&zwnj;ی مزبور نیز که خود بی&zwnj;شباهت به توپ نبود، درون بال&zwnj;های
                       یک
                       پرنده&zwnj;ی آبی&zwnj;رنگ قرار داشت. پرنده&zwnj;ای که گفته
                       می&zwnj;شود نماد آزادی بود و حالت پرهایش شباهت زیادی به آرم الله
                       موجود در پرچم ایران داشت.
                       این لوگو تا سال ۱۳۷۰ روی لباس و پرچم تیم استقلال خودنمایی
                       می&zwnj;کرد، تا اینکه در نهایت جای خود را به لوگویی
                       مفهومی&zwnj;تر و با معناتر داد. یک دایره با کادری آبی رنگ که فضای
                       سفید درون آن توسط سه حلقه به رنگ&zwnj;های سفید و آبی
                       روشن اشغال شده بود و یکی از حلقه&zwnj;ها تصویری شبیه به جقه را
                       ایجاد
                       کرده بود.
                       این بار نیز حلقه&zwnj;های تداعی&zwnj;کننده&zwnj;ی چرخ&zwnj;های دوچرخه به لوگوی
                       استقلال بازگشته بودند و با وجود سادگی، مفاهیم
                       بسیاری را به مخاطب القا می&zwnj;کردند. این لوگوی ساده و مفهومی تا
                       سال
                       ۷۹ مهمان لباس&zwnj;ها و تمامی المان&zwnj;&zwnj;های مرتبط
                       با تیم استقلال بود و به مدت ۱۰ سال نشان اصلی باشگاه به حساب
                       می&zwnj;آمد. تا اینکه باشگاه به&zwnj;طور ناگهانی تصمیم به
                       تغییر لوگو گرفت و یک لوگوی عجیب را جایگزین لوگوی قبلی کرد.

                   </p>
               <span id="more" style="display: contents;"></span>

           </div>
           <div class="myB" style="display: block;"></div>
           <button onclick="myFunction()" id="myBtn">مشاهده بیشتر<img src="{{asset('img/noun-scroll-down-2623546.png')}}" style="width: 18px;"></button>
       </div>
   </div>
</div>
@endsection