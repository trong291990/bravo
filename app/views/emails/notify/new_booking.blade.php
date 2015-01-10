
<body>
   <!-- start of header -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="header">
      <tbody>
         <tr>
            <td>
               <table width="580" bgcolor="#006fc0" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" hlitebg="edit" shadow="edit">
                  <tbody>
                     <tr>
                        <td>
                           <!-- logo -->
                           <table width="180" cellpadding="0" cellspacing="0" border="0" align="left" class="devicewidth">
                              <tbody>
                                 <tr>
                                    <td valign="middle" width="270" style="padding:5px;" class="logo">
                                       <div class="imgpop">
                                          <a href="#"><img width="80" src="http://bravoindochinatour.com/frontend/images/page/main_logov2.jpg"
										  alt="logo" border="0" style="display:block; border:none; outline:none; text-decoration:none;" st-image="edit" class="logo"></a>
                                       </div>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                           <!-- End of logo -->
                           <!-- menu -->
                           <table width="380" cellpadding="0" cellspacing="0" border="0" align="right" class="devicewidth">
                              <tbody>
                                 <tr>
                                    <td width="370" valign="middle" style="font-family: Helvetica, Arial, sans-serif;font-size: 14px; color: #ffffff;line-height: 24px; padding: 10px 0;" align="right" class="menu" st-content="menu">
                                       <a href="http://bravoindochinatour.com/tours/indochina-tours" style="text-decoration: none; color: #ffffff;">Indochina</a>
                                       &nbsp;|&nbsp;
                                       <a href="http://bravoindochinatour.com/tours/vietnam-tours" style="text-decoration: none; color: #ffffff;">Vietnam</a>
                                       &nbsp;|&nbsp;
                                       <a href="http://bravoindochinatour.com/tours/cambodia-tours" style="text-decoration: none; color: #ffffff;">Cambidia</a>
									   &nbsp;|&nbsp;
                                       <a href="http://bravoindochinatour.com/tours/laos-tours" style="text-decoration: none; color: #ffffff;">Lao</a>
									   &nbsp;|&nbsp;
                                       <a href="http://bravoindochinatour.com/tours/thailand-tours" style="text-decoration: none; color: #ffffff;">Thailand</a>
                                    </td>
                                    <td width="20"></td>
                                 </tr>
                              </tbody>
                           </table>
                           <!-- End of Menu -->
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- end of header -->


<div class="block">
   <!-- start textbox-with-title -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="fulltext">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
                  <tbody>
                     <!-- Spacing -->
                     <tr>
                        <td width="100%" height="30"></td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td>
                           <table width="540" align="center" cellpadding="0" cellspacing="0" border="0" class="devicewidthinner">
                              <tbody>
                                 <!-- Title -->
                                 <tr>
                                    <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:center;line-height: 20px;" st-title="fulltext-title">
                                      Customer booked on tour: <b>{{ $reservation->tour->name }}</b> 
                                    </td>
                                 </tr>
                                 <!-- End of Title -->
                                 <!-- spacing -->
                                 <tr>
                                    <td height="5"></td>
                                 </tr>
                                 <!-- End of content -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="10"></td>
                                 </tr>
                                 <!-- Spacing -->
                                 <!-- button -->
                                 <tr>
                                    <td>

                                       <table height="36" align="center" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="36" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:25px; padding-right:25px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="{{route('tour.show', array( $reservation->tour->area->slug, $reservation->tour->slug))}}">View this tour</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>


                                       
                                    </td>
                                 </tr>
                                 <!-- /button -->
                                 <!-- Spacing -->
                                 <tr>
                                    <td width="100%" height="30"></td>
                                 </tr>
                                 <!-- Spacing -->
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- end of textbox-with-title -->
</div>


<div class="block">
   <!-- start of left image -->
   <table width="100%" bgcolor="#f6f4f5" cellpadding="0" cellspacing="0" border="0" id="backgroundTable" st-sortable="leftimage">
      <tbody>
         <tr>
            <td>
               <table bgcolor="#ffffff" width="580" cellpadding="0" cellspacing="0" border="0" align="center" class="devicewidth" modulebg="edit">
                  <tbody>
                     <!-- Spacing -->
                     <tr>
                        <td height="20"></td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td>
                           <table width="540" align="center" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                              <tbody>
                                 <tr>
                                    <td>
                                       <!-- start of text content table -->
                                       <table width="200" align="left" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- image -->
                                             <tr>
                                                <td width="200" height="180" align="center">
                                                   <img src="{{$reservation->tour->thumbnailURL()}}" alt="" border="0" width="180" height="180" style="display:block; border:none; outline:none; text-decoration:none;">
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- mobile spacing -->
                                       <table align="left" border="0" cellpadding="0" cellspacing="0" class="mobilespacing">
                                          <tbody>
                                             <tr>
                                                <td width="100%" height="15" style="font-size:1px; line-height:1px; mso-line-height-rule: exactly;">&nbsp;</td>
                                             </tr>
                                          </tbody>
                                       </table>
                                       <!-- mobile spacing -->
                                       <!-- start of right column -->
                                       <table width="330" align="right" border="0" cellpadding="0" cellspacing="0" class="devicewidthinner">
                                          <tbody>
                                             <!-- title -->
                                             <tr>
                                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 18px; color: #333333; text-align:left;line-height: 20px;" st-title="leftimage-title">
                                                   Customer Informations 
                                                </td>
                                             </tr>
                                             <!-- end of title -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="20"></td>
                                             </tr>
                                             <!-- Spacing -->
                                             <!-- content -->
                                             <tr>
                                                <td style="font-family: Helvetica, arial, sans-serif; font-size: 13px; color: #95a5a6; text-align:left;line-height: 24px;" st-content="leftimage-paragraph">
                                                  <ul style="padding-left: 15px;">
                                                        <li>Customer's name: {{ $reservation->customer_name }} </li>  
                                                        <li>Email: {{ $reservation->customer_email }} </li>  
                                                        <li>Phone: {{ $reservation->customer_phone }} </li> 
                                                        <li>Number of traveling: {{ $reservation->traveling }} </li> 
                                                        <li>Start date: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $reservation->start_date)->format('M d,Y')}} </li> 
                                                  </ul>
                                                </td>
                                             </tr>
                                             <!-- end of content -->
                                             <!-- Spacing -->
                                             <tr>
                                                <td width="100%" height="10"></td>
                                             </tr>
                                             <!-- button -->
                                             <tr>
                                                <td>
                                                   <table height="30" align="left" valign="middle" border="0" cellpadding="0" cellspacing="0" class="tablet-button" st-button="edit">
                                                                  <tbody>
                                                                     <tr>
                                                                        <td width="auto" align="center" valign="middle" height="30" style=" background-color:#0db9ea; border-top-left-radius:4px; border-bottom-left-radius:4px;border-top-right-radius:4px; border-bottom-right-radius:4px; background-clip: padding-box;font-size:13px; font-family:Helvetica, arial, sans-serif; text-align:center;  color:#ffffff; font-weight: 300; padding-left:18px; padding-right:18px;">
                                                                        
                                                                           <span style="color: #ffffff; font-weight: 300;">
                                                                              <a style="color: #ffffff; text-align:center;text-decoration: none;" href="{{route('admin.reservation.index')}}">Read More</a>
                                                                           </span>
                                                                        </td>
                                                                     </tr>
                                                                  </tbody>
                                                               </table>
                                                </td>
                                             </tr>
                                             <!-- /button -->
                                          </tbody>
                                       </table>
                                       <!-- end of right column -->
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                     <!-- Spacing -->
                     <tr>
                        <td height="20"></td>
                     </tr>
                     <!-- Spacing -->
                  </tbody>
               </table>
            </td>
         </tr>
      </tbody>
   </table>
   <!-- end of left image -->
</div>


</body>