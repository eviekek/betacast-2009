							<div class="headerRCBox">
								<b class="rch">
								<b class="rch1"><b></b></b>
								<b class="rch2"><b></b></b>
								<b class="rch3"></b>
								<b class="rch4"></b>
								<b class="rch5"></b>
								</b>
								<div class="content">							
									<div class="headerTitle">
										<span>Connect with <?php echo htmlspecialchars($username) ?></span>
									</div>			
								</div>
							</div>
							<table id="connectTable" class="basicBoxes" cellpadding="0" cellspacing="0">
								<tr>
										<td valign="top">
											<div style="font-weight: 700; font-size: 14px!important;text-align: center;"><?php echo htmlspecialchars($user['connect']) ?></div>
											<table cellspacing="5" style="margin: auto;">
												<tbody>
													<tr>
														<td><img src="/vi/static/friend.gif"> <a href="javascript:friend('<?php echo htmlspecialchars($username) ?>');">Add as Friend</a></td>
														<td><img src="/vi/static/message.gif"> <a href="/inbox?to=<?php echo htmlspecialchars($username) ?>">Send Message</a></td>
													</tr>
													<tr>
														<td><img src="/vi/static/share.gif"> <a href="/subscription_center?add_user=<?php echo htmlspecialchars($username) ?>">Subscribe</a></td>
                                                        <td><img src="/vi/static/comment.gif"> <a href="/channel_post_comment?user=<?php echo htmlspecialchars($username) ?>">Comment</a></td>
													</tr>
												</tbody>
											</table>
										</td>
								</tr>											
							</table>
							<div class="linkSection">
									<div class="extraVertSpaceSm"><a href="<?php echo $url ?>"><?php echo $url ?></a></div>
							</div>	
