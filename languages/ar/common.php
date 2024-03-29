<?php
//
// kleeja language
// Arabic
//

if (!defined('IN_COMMON'))
	exit;

if (empty($lang) || !is_array($lang))
	$lang = array();



$lang = array_merge($lang, array(
	//language inforamtion
	'DIR' 					=> 'rtl',
	'LANG_SMALL_NAME'		=> 'ar-sa',

	'HOME' 					=> 'البداية',
	'INDEX' 				=> 'الرئيسية',
	'SITE_CLOSED' 			=> 'الموقع مغلق !',
	'STOP_FOR_SIZE' 		=> 'متوقف حالياً !',
	'SIZES_EXCCEDED' 		=> 'الحجم الكلي للمركز استنفذ .. سوف نعود قريباً',
	'ENTER_CODE_IMG' 		=> 'أدخل ما تراه بالصورة داخل الصندوق',
	'SAFE_CODE' 			=> 'تفعيل الكود الأمني في التحميل',
	'LAST_VISIT' 			=> 'آخر زيارة',
	'FLS_LST_VST_SEARCH' 	=> 'عرض الملفات منذ',
	'IMG_LST_VST_SEARCH'	=> 'عرض الصور منذ',
	'NEXT' 					=> 'التالي &raquo;',
	'PREV' 					=> '&laquo; السابق',
	'INFORMATION' 			=> 'معلومات',
	'WELCOME' 				=> 'مرحباً بك',
	'KLEEJA_VERSION' 		=> 'إصدار كليجا',
	'NUMBER_ONLINE' 		=> 'الاعضاء المتواجدون حالياً',
	'NUMBER_UONLINE' 		=> 'أعضاء',
	'NUMBER_VONLINE' 		=> 'زوار',
	'USERS_SYSTEM' 			=> 'نظام المستخدمين',
	'ERROR_NAVIGATATION' 	=> 'خطأ بالتوجه..',
	'USER_LOGIN' 			=> 'تسجيل الدخول',
	'LOGIN' 				=> 'دخول',
	'USERNAME' 				=> 'اسم المستخدم',
	'PASSWORD' 				=> 'كلمة المرور',
	'EMPTY_USERNAME' 		=> 'حقل اسم المستخدم فارغ',
	'EMPTY_PASSWORD' 		=> 'حقل كلمة المرور فارغ',
	'LOSS_PASSWORD' 		=> 'نسيت كلمة المرور؟',
	'LOGINED_BEFORE' 		=> 'أنت داخل بالفعل',
	'LOGOUT' 				=> 'خروج',
	'EMPTY_FIELDS' 			=> 'خطأ.. حقول ناقصة !',
	'LOGIN_SUCCESFUL' 		=> 'لقد تم الدخول بنجاح',
	'LOGIN_ERROR' 			=> 'خطأ.. لا يمكن الدخول !',
	'REGISTER_CLOSED' 		=> 'نأسف.. التسجيل مقفل حالياً',
	'PLACE_NO_YOU' 			=> 'منطقة محظورة',
	'NOT_EXSIT_USER'		=> 'لا يوجد لدينا عضو بهذه البيانات , او انه تم حذفه!',
	'REGISTERED_BEFORE' 	=> 'لقد قمت بالتسجيل سابقاً',
	'REGISTER' 				=> 'تسجيل عضوية جديده',
	'EMAIL' 				=> 'البريد الإلكتروني',
	'VERTY_CODE' 			=> 'كود الأمان :',
	'NOTE_CODE' 			=> 'ادخل الأحرف الموجود في الصورة بالشكل الصحيح مرتبة بشكل دقيق.',
	'WRONG_EMAIL' 			=> 'بريد خاطيء',
	'WRONG_NAME' 			=> 'الاسم يجب أن يكون بين 4 احرف و 25 حرف!.',
	'WRONG_LINK' 			=> 'رابط خاطيء..',
	'EXIST_NAME' 			=> 'الاسم موجود مسبقاً',
	'EXIST_EMAIL' 			=> 'البريد موجود مسبقاً',
	'WRONG_VERTY_CODE' 		=> 'كود الأمان خاطيء',
	'CANT_UPDATE_SQL' 		=> 'لا يمكن التحديث لقاعدة البيانات',
	'CANT_INSERT_SQL' 		=> 'لا يمكن إدخال المعلومات لقاعدة البيانات',
	'REGISTER_SUCCESFUL' 	=> 'شكراً لتسجيلك معناً',
	'LOGOUT_SUCCESFUL' 		=> 'تم الخروج بنجاح',
	'LOGOUT_ERROR' 			=> 'هناك مشكلة بالخروج',
	'FILECP' 				=> 'إدارة الملفات',
	'DEL_SELECTED' 			=> 'حذف المحدد',
	'EDIT_U_FILES' 			=> 'إدارة ملفاتك',
	'FILES_UPDATED' 		=> 'تم تحديث الملفات بنجاح',
	'PUBLIC_USER_FILES' 	=> 'مجلد ملفات العضو',
	'FILEUSER' 				=> 'مجلد ملفات',
	'GO_FILECP' 			=> 'اضغط هنا لإدارة ملفاتك هذه',
	'YOUR_FILEUSER' 		=> 'مجلدك الشخصي',
	'COPY_AND_GET_DUD' 		=> 'انسخ الرابط وأعطه لأصدقائك ليطلعوا على مجلدك ',
	'NO_FILE_USER'			=> 'لا يوجد أي ملفات في حساب العضوية حتى الآن .. !',
	'CLOSED_FEATURE' 		=> 'خاصية مغلقة',
	'USERFILE_CLOSED' 		=> 'خاصية مجلدات المستخدمين مغلقة !',
	'PFILE_4_FORUM' 		=> 'قم بالذهاب للمنطقة الأعضاء لتغيير بياناتك',
	'USER_PLACE' 			=> 'منطقة أعضاء',
	'PROFILE' 				=> 'تعديل البيانات',
	'EDIT_U_DATA' 			=> 'تحديث بياناتك',
	'PASS_ON_CHANGE' 		=> 'تعديل كلمة المرور',
	'OLD' 					=> 'القديمة',
	'NEW' 					=> 'الجديدة',
	'NEW_AGAIN' 			=> 'تكرار الجديدة',
	'UPDATE' 				=> 'تحديث',
	'PASS_O_PASS2' 			=> 'كلمة المرور القديمة مهمة واكتب كلمتا المرور الجديدتان بدقة',
	'DATA_CHANGED_O_LO' 	=> 'تم تحديث بياناتك وسوف تستخدم بدخولك القادم',
	'CURRENT_PASS_WRONG'	=> 'كلمة المرور الحالية خاطئه, اعد كتابتها لتستطيع التعديل!',
	'DATA_CHANGED_NO' 		=> 'لم تحدث بياناتك.. لن تتغير المعلومات',
	'LOST_PASS_FORUM' 		=> 'اذهب للمنتدى واسترجع كلمة المرور',
	'GET_LOSTPASS' 			=> 'استعادة كلمة المرور',
	'E_GET_LOSTPASS' 		=> 'لاستعادة كلمة المرور يجب أن تكتب البريد الالكتروني المسجل لدينا',
	'WRONG_DB_EMAIL' 		=> 'لا يوجد بريد كهذا في قاعدة البيانات لدينا',
	'GET_LOSTPASS_MSG' 		=> "لقد قمت بطلب  إستعادة كلمة مرورك , لكن لتجنب السبام قم بالضغط على الرابط التالي لتأكيدها : \r\n %1\$s \r\n كلمة المرور الجديده : %2\$s",
	'CANT_SEND_NEWPASS' 	=> 'خطأ.. لم يتم إرسال كلمة المرور الجديدة!',
	'OK_SEND_NEWPASS' 		=> 'تم إرسال كلمة المرور الجديدة..',
	'OK_APPLY_NEWPASS' 		=> 'تم ضبط كلمة المرور الجديده , يمكنك الآن الدخول بها .',
	'GUIDE' 				=> 'الملفات المسموحة',
	'GUIDE_EXP' 			=> 'الملفات المسموحة وامتداداتها :',
	'EXT' 					=> 'الامتداد',
	'SIZE' 					=> 'الحجم',
	'REPORT' 				=> 'إبلاغ عن محتوى',
	'YOURNAME' 				=> 'اسمك',
	'URL' 					=> 'الرابط',
	'REASON' 				=> 'السبب',
	'NO_ID' 				=> 'لم تحدد ملف..!!',
	'NO_ME300RES' 			=> 'رجاءً.. حقل السبب لا يمكن ملأه بأكثر من 300 حرف!!',
	'THNX_REPORTED' 		=> 'تم التبليغ.. شكراً لاهتمامك',
	'RULES' 				=> 'شروط الخدمة',
	'NO_RULES_NOW' 			=> 'لا يوجد قوانين حالياً',
	'E_RULES' 				=> 'هذه هي شروط الخدمة',
	'CALL' 					=> 'اتصل بنا',
	'SEND' 					=> 'أرسل',
	'TEXT' 					=> 'نص الرسالة',
	'NO_ME300TEXT' 			=> 'رجاءً.. حقل النص لا يمكن ملأه بأكثر من 300 حرف!!',
	'THNX_CALLED' 			=> 'تم الإرسال. . سوف يتم الرد قريباً',
	'NO_DEL_F' 				=> 'نأسف.. خاصية الحذف المباشر معطلة من المدير',
	'E_DEL_F' 				=> 'الحذف المباشر',
	'WRONG_URL' 			=> 'خطأ.. في الرابط..',
	'CANT_DEL_F' 			=> 'خطأ.. لايمكن حذف الملف.. ربما معلوماتك خاطئة او قد تم حذف مسبقاً',
	'CANT_DELETE_SQL' 		=> 'لا يمكن الحذف من قاعدة البيانات',
	'DELETE_SUCCESFUL' 		=> 'تم الحذف بنجاح',
	'STATS' 				=> 'إحصائيات المركز',
	'STATS_CLOSED' 			=> 'صفحة الإحصائيات معطلة من المدير!',
	'FILES_ST' 				=> 'تم  تحميل ',
	'FILE' 					=> 'ملف',
	'IMAGE' 				=> 'صورة',
	'USERS_ST' 				=> 'عدد الأعضاء',
	'USER' 					=> 'عضو',
	'SIZES_ST' 				=> 'حجم جميع الملفات',
	'LSTFLE_ST' 			=> 'آخر ملف تم رفعه',
	'LSTDELST' 				=> 'آخر فحص للملفات الخاملة ',
	'LAST_1_H' 				=> 'هذه الإحصائيات لقبل ساعة من الآن',
	'DOWNLAOD' 				=> 'تحميل',
	'FILE_FOUNDED' 			=> '[ تم إيجاد الملف ]',
	'WAIT' 					=> 'انتظر رجاءً ..',
	'CLICK_DOWN' 			=> 'اضغط هنا لتنزيل الملف',
	'JS_MUST_ON' 			=> 'لا بد من تفعيل الجافا سكربت في  متصفحك !!',
	'FILE_INFO' 			=> 'معلومات عن الملف',
	'FILENAME' 				=> 'اسم الملف',
	'FILESIZE' 				=> 'حجم الملف',
	'FILETYPE' 				=> 'نوع الملف',
	'FILEDATE' 				=> 'تاريخ الرفع',
	'LAST_DOWN' 			=> 'آخر تحميل',
	'FILEUPS' 				=> 'عدد التحميلات',
	'FILEREPORT' 			=> 'ملف مخالف  : إرسال إبلاغ عن المحتوى',
	'FILE_NO_FOUNDED' 		=> 'لم نتمكن من إيجاد الملف..!!',
	'IMG_NO_FOUNDED' 		=> 'لم نتمكن من إيجاد الصورة..!!',
	'NOT_IMG' 				=> 'ليست صورة.. هذا ملف!!',
	'MORE_F_FILES' 			=> 'هذا آخر حد يمكنك تحميله',
	'DOWNLOAD_F' 			=> '[ رفع الملفات ]',
	'DOWNLOAD_T' 			=> '[ سحب الملفات من رابط ]',
	'PAST_URL_HERE'			=> '[ ألصق الرابط هنا ]',
	'SAME_FILE_EXIST' 		=> 'الملف "%s" موجود مسبقاً , قم بإعادة تسمية الملف او تحميل ملف آخر.',
	'NO_FILE_SELECTED' 		=> 'لم تقم بإختيار ملف!!',
	'WRONG_F_NAME' 			=> 'اسم الملف "%s" يحتوي على أحرف غير مسموحة .. الرجاء تغيير اسم الملف والمحاولة من جديد ',
	'FORBID_EXT' 			=> ' الامتداد "%s" غير مسموح ',
	'SIZE_F_BIG' 			=> 'الحجم للملف "%1$s" يجب أن يكون أقل من %2$s .',
	'CANT_CON_FTP' 			=> 'لايمكن الاتصال بـ ',
	'URL_F_DEL' 			=> 'رابط الحذف',
	'URL_F_THMB' 			=> 'رابط المصغرة',
	'URL_F_FILE' 			=> 'رابط الملف',
	'URL_F_IMG' 			=> 'رابط الصورة المباشر',
	'URL_F_BBC' 			=> 'رابط للمنتديات',
	'IMG_DOWNLAODED' 		=> 'تم تحميل الصورة بنجاح',
	'FILE_DOWNLAODED' 		=> 'تم تحميل الملف بنجاح',
	'CANT_UPLAOD' 			=> 'خطأ.. لم يتم تحميل الملف "%s" لأسباب غير معروفة',
	'NEW_DIR_CRT' 			=> 'لقد تم انشاء مجلد جديد',
	'PR_DIR_CRT' 			=> 'لم يتم اعطاء التصريح للمجلد',
	'CANT_DIR_CRT' 			=> 'لم يتم إنشاء مجلد تلقائياً.. قم بإنشاءه انت',
	'AGREE_RULES' 			=> 'بالضغط على الزر بالاسفل فانت توافق على %1$sشروط المركز%2$s.',
	'CHANG_TO_URL_FILE' 	=> 'تبديل طريقة التحميل.. رابط أو إدخال',
	'URL_CANT_GET' 			=> 'خطأ في جلب الملف من الرابط',
	'ADMINCP' 				=> 'مركز التحكم',
	'JUMPTO' 				=> 'انتقل إلى',
	'GO_BACK_BROWSER' 		=> 'رجوع للخلف',
	'U_R_BANNED' 			=> 'لقد تم حظر الآي بي هذا..',
	'U_R_FLOODER' 			=> 'لقد قمت بتخطي عدد مرات عرض الصفحة بالوقت المحدد..',
	'YES' 					=> 'نعم',
	'NO' 					=> 'لا',
	'LANGUAGE' 				=> 'اللغة',
	'NORMAL' 				=> 'عادي',
	'STYLE' 				=> 'الستايل',
	'GROUP' 				=> 'المجموعة',
	'UPDATE_FILES' 			=> 'تحديث الملفات',
	'BY' 					=> 'من',
	'FILDER' 				=> 'مجلد',
	'DELETE' 				=> 'حذف',
	'GUST' 					=> 'زائر',
	'NAME' 					=> 'الإسم',
	'CLICKHERE' 			=> 'اضغط هنا',
	'IP' 					=> 'IP',
	'TIME' 					=> 'الوقت',
	'N_IMGS' 				=> 'الصور',
	'N_ZIPS' 				=> 'ملفات الضغط',
	'N_TXTS' 				=> 'ملفات النصوص',
	'N_DOCS' 				=> 'مستندات',
	'N_RM' 					=> 'RealMedia',
	'N_WM' 					=> 'WindowsMedia',
	'N_SWF' 				=> 'ملفات الفلاش',
	'N_QT' 					=> 'QuickTime',
	'N_OTHERFILE' 			=> 'ملفات أخرى',
	'RETURN_HOME' 			=> 'رجوع إلى المركز',
	'TODAY' 				=> 'اليوم',
	'YESTERDAY' 			=> 'امس',
	'DAYS' 					=> 'أيام',
	'SUBMIT' 				=> 'موافق',
	'EDIT' 					=> 'تعديل',
	'DISABLE' 				=> 'تعطيل',
	'ENABLE' 				=> 'تفعيل',
	'OPEN'					=> 'افتح',
	'NOTE'					=>	'ملاحظة',
	'WARN'					=>	'انتبه',
	'BITE' 					=> 'بايت',
	'KILOBYTE'				=> 'كيلوبايت',
	'NOT_SAFE_FILE'				=> 'نظام كليجا  اكتشف أن  الملف "%s" غير آمن  ويحتوي على أكواد خبيثه  .. !!!',
	'ARE_YOU_SURE_DO_THIS'		=> 'هل أنت متأكد من القيام بهذه العملية؟',
	'SITE_FOR_MEMBER_ONLY'		=> 'المركز للأعضاء فقط ، قم بالتسجيل أو بالدخول حتى تتمكن من التحميل.',
	'AUTH_INTEGRATION_N_UTF8_T'	=> '%s ليست utf8',
	'AUTH_INTEGRATION_N_UTF8' 	=> '%s يجب أن يكون ترميز قاعدة البيانات الخاصة به utf8 لكي يتم الربط مع كليجا!.',
	'SCRIPT_AUTH_PATH_WRONG'	=> 'مسار السكربت %s الذي تم ربط عضويات كليجا معه خاطئ ,قم بضبطه',
	'SHOW_MY_FILECP'			=> 'السماح بعرض ملفاتي',
	'PASS_CHANGE'				=> 'تغيير كلمة المرور',
	'EDIT_U_AVATER'				=> 'تغيير الصورة الرمزية',
	'EDIT_U_AVATER_LINK'		=> 'لتغيير الصورة الرمزيه, قم بالدخول الى الموقع %1$s" اضغط هنا "%2$s والتسجيل بالبريد المسجل به بالمركز',
	'MOST_EVER_ONLINE'			=> 'اكثر عدد تواجد للاعضاء بالمركز كان',
	'ON'						=> 'في',
	'LAST_REG'					=> 'آخر عضو مسجل',
	'NEW_USER'					=> 'عضو جديد',
	'ADD_UPLAD_A'				=> 'إضافة المزيد',
	'ADD_UPLAD_B'				=> 'حذف',
	'COPYRIGHTS_X'				=> 'جميع الحقوق محفوظة',
	'CHECK_ALL'					=> 'تحديد الكل',
	'BROSWERF'					=> 'استعراض الملفات',
	'REMME'						=> 'تذكرني',
	'REMME_EXP'					=> 'علًم هذا الخيار ان كان جهازك غير مشترك مع غيرك',
	'HOUR'						=> 'ساعة',
	'5HOURS'					=> '5 ساعات',
	'DAY'						=> 'يوم',
	'WEEK'						=> 'اسبوع',
	'MONTH'						=> 'شهر',
	'YEAR'						=> 'سنه',
	'INVALID_FORM_KEY'			=> 'نموذج خاطئ , او انك تعديت الوقت المسموح فيه لملأ النموذج.',
	'INVALID_GET_KEY'			=> 'عفوا, هذا الرابط خاص بجلسة انتهت مدتها وتم منعه للامان, اعد المحاولة .',
	'REFRESH_CAPTCHA'			=> 'إضغط لتحديث الصوره بواحده جديده',
	'CHOSE_F'					=> 'فضلا قم بإختيار ملف واحد على الاقل',
	'NO_REPEATING_UPLOADING'	=> 'لا يمكنك رفع الملفات بشكل متوالي .. فضلاً انتظر 30 ثانية ثم  حاول مرة أخرى ... !.',
	'FILES_DELETED' 			=> 'تم حذف الملفات المحدده بنجاح !',
	'GUIDE_GROUPS' 			    => 'مجموعة',
	'ALL_FILES' 			    => 'عدد جميع الملفات',
	'ALL_IMAGES' 			    => 'عدد جميع الصور',
	'WAIT_LOADING'				=> 'فضلاً انتظر جاري رفع الملفات .....',
	'NOTICECLOSED'				=> 'تنبيه : المركز مغلق',
	'UNKNOWN'					=> 'غير معروف',
	'WE_UPDATING_KLEEJA_NOW'	=> 'الموقع مغلق للتطوير والترقيه لاخر نسخة , لذا يرجى الصبر ...',
	'ERROR_TRY_AGAIN'			=> 'خطأ , حاول مجدداً.',
	'VIEW'						=> 'عرض',
	'NONE'						=> 'لا شيء',
	'NOTHING'					=> 'لا يوجد اي ملفات أو صور جديدة ..!!',
	'YOU_HAVE_TO_WAIT'			=> 'انتظر %s ثانية وبعد انقضاء الفترة الزمنيه قم بإعادة رفع الملفات',
	'REPEAT_PASS'				=> 'اعد كلمة المرور',
	'PASS_NEQ_PASS2'			=> 'كلمات المرور غير متطابقة !',
	'LOAD_IS_HIGH_NOW'			=> 'المركز يواجه ضغط عالي حالياً, انتظر قليلا ومن ثم اعد تحميل الصفحة من جديد.',
	#1.5
	'GROUP'						=> 'مجموعة',
	'ADMINS'					=> 'المسؤولين',
	'GUESTS'					=> 'الزوار',
	'USERS'						=> 'الاعضاء',
	'DELETE_INSTALL_FOLDER'		=> 'لتستطيع استخدام كليجا الآن، قم بحذف مجلد install. لن تعمل كليجا بوجود هذا المجلد.',
	'HV_NOT_PRVLG_ACCESS'		=> 'لاتملك صلاحيات للوصول لهذه الصفحة',
	'W_PERIODS' 		=> array("ثانية", "دقيقة", "ساعة", "يوم", "اسبوع", "شهر", "سنة", "عقد"),
	'W_PERIODS2'		=> array("ثانيتين", "دقيقتين", "ساعتين", "يومان", "اسبوعين", "شهرين", "سنتان", "عقدين"),
	'W_PERIODS_P'		=> array("ثواني", "دقائق", "ساعات", "أيام", "اسابيع", "أشهر", "سنين", "عقود"),
	'W_FROM' 			=> 'منذ',
	'W_AGO' 			=> 'مضت',
	'W_FROM NOW'		=> 'من الآن',
	'TIME_PM'			=> 'م',
	'TIME_AM'			=> 'ص',
	'NOT_YET'			=> 'ليس بعد!',
	'NOT_FOUND'			=> 'إما انه غير موجود , او تم حذفه من قبل المستخدم نفسه , او الادارة , او هناك خطأء في فتح الملف!.',
	'TIME_ZONE'			=> 'المنطقة الزمنية',
	'OR'				=> 'او',
	'AND'				=> 'و',
	'CHANGE'			=> 'تغيير',
	'FOR'				=> 'لـ',
	'ALL'				=> 'الجميع',
	'NOW'				=> 'الآن',

	));

#<-- EOF
