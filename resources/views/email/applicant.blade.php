<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

		.header {
		    color: #333;
		    font-size: 19px;
		    font-weight: bold;
		    text-shadow: 0 1px 0 white;
		}

		.content-cell {
			font-size: 16px;
			line-height: 1.5;
		}

        .button {
        	font-size: 16px;
        	margin-bottom: 25px;
        }
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <tr>
					    <td class="header">
					        Pemberitahuan
					    </td>
					</tr>

                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
										<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
											<tr>
												<td>
													<strong>Yth Pelamar,</strong>
													<br>
													Terimakasih telah mendaftar di lowongan yang telah kami buka. Kami akan mengumumkan hasilnya (via WhatsApp atau SMS) secepatnya.
													<br>
													Berikut adalah akun Anda yang akan digunakan untuk melakukan tes:
													<br>
													Username: <strong>{{ $applicant->username }}</strong>
													<br>
													Password: <strong>{{ $applicant->username }}</strong>
													<br>
													Akun username dan password ini <strong>jangan sampai hilang</strong>.
												</td>
											</tr>
										</table>
                                    </td>
                                </tr>
							    <tr>
							        <td align="center">
							            <table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
							                <tr>
							                    <td align="center">
							                        <table border="0" cellpadding="0" cellspacing="0" role="presentation">
							                            <tr>
							                                <td></td>
							                            </tr>
							                        </table>
							                    </td>
							                </tr>
							            </table>
							        </td>
							    </tr>
                            </table>
                        </td>
                    </tr>

					<tr>
						<td>
							<table class="footer" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation">
								<tr>
									<td class="content-cell" align="center">
										© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
									</td>
								</tr>
							</table>
						</td>
					</tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
