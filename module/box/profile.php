							<div class="headerRCBox">
								<b class="rch">
								<b class="rch1"><b></b></b>
								<b class="rch2"><b></b></b>
								<b class="rch3"></b>
								<b class="rch4"></b>
								<b class="rch5"></b>
								</b>
								<div class="content">
								<div class="headerTitleEdit">
								<div class="headerTitleRight"><?php if($username == $_SESSION['username']) { ?><a href="/channel_settings">Edit channel</a><?php } else{ ?><a href="/subscription_center?add_user=<?php echo htmlspecialchars($username) ?>">Subscribe</a><?php } ?>
								</div>
								<span>
										<?php echo htmlspecialchars($username) ?> Channel
								</span>
								</div>
								</div>
							</div>

							<div id="pBox" class="highlightBoxes" style="text-align:left">
								<table border="0">
									<tr>
										<td>
											<img src="/vi/thumb/<?php echo $user['channelicon'] ?>.jpg" id="profileImg" class="imageProperties"/>
											
										</td>
										<td valign="top">
											<div>
												<a href="/subscription_center?add_user=<?php echo htmlspecialchars($username) ?>">
													<img src="/vi/static/btn_subscribe_md_yellow_99x21.gif" border="0" align="absmiddle" alt="Subscribe to <?php echo htmlspecialchars($username) ?>">
												</a>
											</div>
											<div class="extraVertSpaceMini">
												To <strong><?php echo htmlspecialchars($username) ?></strong>
											</div><br>									
												<!-- <strong>Age: </strong> age <br/> -->
												<?php if(!empty($user['location'])) { ?><strong>Location: </strong> <?php echo htmlspecialchars(substr($user['location'], 0, 15)); ?> <br/> <?php } ?>
										</td>
									</tr>
								</table>	
								<table>	
									<tr>
										<td colspan="2" align="left">
												<!--Begin Stats Section-->
												<table class="statsBox" cellpadding="0" width="290">
													<tr>
														<td valign="top">
															<strong>Channel Views:</strong> <?php echo $user['views'] ?><br />
															<strong>Subscribers:</strong> <a href="/profile_subscribers?user=<?php echo htmlspecialchars($username) ?>"><?php echo $user['subs'] ?></a><br>
															<?php if($user['partner'] == "1") { ?><strong>MCN:</strong> <?php echo $user['mcn']; ?><?php } ?>
														</td>
													</tr>
												</table>
												<!--End Stats Section-->
												<!--Begin Channel Description-->
												<div class="sepBox">
													<span id="BeginvidDescchannel_desc"><?php echo htmlspecialchars($user['bio']) ?></span>
												</div>
												<!--End Channel Description-->
												<!--Begin Honors Section-->
												<!--End Honors Section-->
													<div class="sepBoxReg">
														<span class="largeTitles">About Me</span>
													<br />													
														<strong>Member Since: </strong> <?php echo date("M d, Y", strtotime($user['created_at'])); ?><br/> 
														<strong>Last Login: </strong> <?php echo date("M d, Y", $user['lastlogin']); ?><br/> 
													</div>									
														<span id="BeginvidDescaboutme"><?php if(isset($loggedu['ownsmcn']) && $user['mcn'] == $loggedu['ownsmcn'])  { ?><a href="/editvanity?user=<?php echo $user['id']; ?>">Edit user vanity</a><?php } ?></span>
													<br />    
													<!--Begin About Me Description-->
												<!--Begin Album Section-->
										</td>
									</tr>
								</table>
							</div>
