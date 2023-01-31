## Human Element Configurable Email Encoding

Solves an issue with Sendgrid

https://docs.sendgrid.com/for-developers/sending-email/send-mime-messages-with-sendgrid

This error happened when using Webscale which was uses SendGrid for email relay services.

SendGrid does not handle `Content-Transfer-Encoding: quoted-printable` and the extra CRLF characters breaks the source content.

For example the `vendor/magento/module-user/view/adminhtml/email/password_reset_confirmation.html` renders as:

```
First Last,=0A=0AThere was recently a request to change the passwor=
d for your account.=0A=0AIf you requested this change, reset your passwo=
rd here:=0A=0Ahttps://domain.com/admin/admin/auth/=
resetpassword/?id=3Dtoken
you did not make this request, you can ignore this email and your passwo=
rd will remain the same.=0A=0AThank you,=0AStore Name
```

This is technically valid for `quoted-printable` but it breaks SendGrid body processing

This module allows you to choose `7bit` for the default email encoding on magnetos transport builder.

By default this module will choose `7bit` but you can test it by switching back to `quoted-printable` with the admin config for this module.

### Installation

```
composer require human-element/module-configurable-email-encoding
```
