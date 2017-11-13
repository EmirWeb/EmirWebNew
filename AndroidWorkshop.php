<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');

include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
include_once('Utils/SyntaxHighlighter.php');

DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/Blog.css');
DomManager::addCSS('CSS/Social.css');
DomManager::addScript('https://staging.taplytics.com/jssdk/2.0.0/6eb86dda0e7f40069b85b84261e9e7d9.min.js?env=staging&log_level=2"');

$TITLE = "Android REST Implementation guide.";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html xmlns:fb="http://www.facebook.com/2008/fbml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" dir="ltr">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />
		<?php echo DomManager::getCSS(); ?>
		<?php echo Facebook::getFacebookArticleHead($TITLE); ?>
	</head>
<body>
<?php
$buttons = array(
NavigationBar::getCell("About.php", "About", "About", false),
NavigationBar::getCell("Projects.php", "Projects", "Projects", false),
NavigationBar::getCell("Blog.php", "Blog", "Blog", false),
NavigationBar::getCell( "/" , "Home", "Main Page", false)
);
echo NavigationBar::getNavigationBar($buttons);
?>
	<div class="Container">
		<div class="TableOfContents">
		<?php  echo Social::getSocialBar(); ?>

			<h2><?php echo $TITLE; ?></h2>
			<ul>
				<li><a href="#Header1">How we did it</a></li>
				<li><a href="#Header2">RabbitMQ</a></li>
				<li><a href="#Header3">Architecture diagram of libraries</a></li>
				<li><a href="#Header4">Screen Detection</a></li>
				<li><a href="#Header5">The Process</a></li>
				<li><a href="#Header6">Memory Game</a></li>
			</ul>
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
		
		<h1 class="Title"><?php echo $TITLE; ?></h1>
		<p>By Emir Hasanbegovic (<a href="http://www.emirweb.com">website</a>, <a href="www.twitter.com/#/phigammemir">twitter</a>, <a href="https://github.com/emir-hasanbegovic">GitHub</a>)</p>
<h2 id="Header1">Quick Introduction</h2>
<p>The goal of this workshop is to share some of the hard-won knowledge we've accrued through years of development at one of the top mobile shops in the world. We're using "A simple app implemented well" as the driving theme. Although the end product will look plain, it will have a robust and flexible foundation that can be used to easily extend the application in numerous ways.</p>
<p>Each section of this worksheet will start with a git tag; these act as checkpoints. If you would like to skip ahead, you can use a section checkpoint to recover an Android project that is ready for that section of the worksheet.</p>
<h2 id="Header2">Getting Setup</h2>
<ul>
	<li>
		Clone a copy of the completed <a href="https://github.com/EmirWeb/UltimateDevConAndroid">source code</a> from github. Then check out the very first commit.
	</li>
	<li> 
		Open your Android IDE. Make sure you have the Android SDK plugin installed. Import your initial Android workshop project.
	</li>
	<li>
		Get a copy of GSON
	</li>
</ul> 

<h2 id="Header3">Person Model</h2>
<p>Using a data model will make your network parsing a lot simpler and efficient due to the gson parser.</p>

<ol>
	<li>Create a new package ending in models.</li>
	<li>Create a new class in that package called PivotalPeopleModel. This object will represent one of our data structures.</li> 
	<li>Copy the following code into the class. We'll use these <b>Keys</b> whenever we refer to data that come from the API. This decouples the API from the application, reducing our dependency on it's structure. If the API changes the name of a field, for example, those changes will be reflected here without having much effect on the rest of the application.</li>

<pre class="brush: java;">
public static final class Keys {
	public static final String ID = "id";
	public static final String LAST_NAME = "lastName";
	public static final String FIRST_NAME = "firstName";
	public static final String ADDRESS = "address";
	public static final String CITY = "city";
}
</pre>
<li>Copy the following code into the class. Using @SerializedName allows GSON, the JSON processing library we'll use, to map data from the API to properties of this model. Another layer of decoupling.</li>

<pre class="brush: java;">
@SerializedName(Keys.ID)
private final Long mId;
@SerializedName(Keys.LAST_NAME)
private final String mLastName;
@SerializedName(Keys.FIRST_NAME)
private final String mFirstName;
@SerializedName(Keys.ADDRESS)
private final String mAddress;
@SerializedName(Keys.CITY)
private final String mCity;

public PivotalPeopleModel(final Long id, final String lastName, final String firstName, final String address, final String city) {
	mId = id;
	mLastName = lastName;
	mFirstName = firstName;
	mAddress = address;
	mCity = city;
}

public Long getId(){
	return mId;
}
public String getLastName() {
	return mLastName;
}
public String getFirstName() {
	return mFirstName;
}
public String getAddress() {
	return mAddress;
}
public String getCity() {
	return mCity;
}
</pre>
<li>Copy the following code into the class. We'll be using a ContentProvider to manage models of this type, so having a method for converting this model into ContentValues is convenient.</li>
<pre class="brush: java;">
public ContentValues getcontentValues() {
	final ContentValues value = new ContentValues();
	value.put(PivotalPeopleTable.Columns.ID, getId());
	value.put(PivotalPeopleTable.Columns.FIRST_NAME, getFirstName());
	value.put(PivotalPeopleTable.Columns.LAST_NAME, getLastName());
	value.put(PivotalPeopleTable.Columns.ADDRESS, getAddress());
	value.put(PivotalPeopleTable.Columns.CITY, getCity());
	return value;
}

public static ContentValues getContentValues(PivotalPeopleModel item) {
	return item.getcontentValues();
}
</pre>
</ol>
<h2 id="Header3">People Table</h2>
<p>The tables are going to be the back bone of our infrastructure. They will host <b>raw</b> data. They will exactly describe the data and relationships that are coming from the server. You will be querying against these in the near future, so ensure that you keep these tables clean and simple.</p>

<ol>
<li>Create a <b>new package</b> ending in database.</li>
<li>Create a <b>new class</b> in that package called PivotalPeopleTable.</li>
<li>Copy the following code into the class. The Columns will be used to refer to the database representation of this model. Similar to the Keys class in the previous section, this serves to decouple the application from the database. If there are changes to the data structure, small modifications here will be all that is required.</li>
<pre class="brush: java;">
public static final class Columns {
	public static final String ID = PivotalPeopleModel.Keys.ID;
	public static final String LAST_NAME = PivotalPeopleModel.Keys.LAST_NAME;
	public static final String FIRST_NAME = PivotalPeopleModel.Keys.FIRST_NAME;
	public static final String ADDRESS = PivotalPeopleModel.Keys.ADDRESS;
	public static final String CITY = PivotalPeopleModel.Keys.CITY;
}
</pre>
<li>Copy the following code into the class. These strings make it convenient to perform basic database operations.</li>
<pre class="brush: java;">
public static String TABLE_NAME = "people";

public static final String DROP = "DROP TABLE IF EXISTS "+ TABLE_NAME;

public static final String CREATE = "CREATE TABLE " + TABLE_NAME + " ( " +
Columns.ID + " INTEGER, " +
Columns.LAST_NAME + " varchar(255), " + 
Columns.FIRST_NAME + " varchar(255), " + 
Columns.ADDRESS + "	varchar(255), " + 
Columns.CITY + " varchar(255) " + ");";

public static final String DATA_CREATE = " INSERT INTO " + TABLE_NAME + 
		" ( " + Columns.ID + ", "+ Columns.LAST_NAME + ", " +Columns.FIRST_NAME + ", " +Columns.ADDRESS + ", " +Columns.CITY + " ) " +
		" values " + 
		" ( 0, 'Emir', 'Hasanbegovic', '69 Yonge Street' , 'Toronto'), " +
		" ( 1, 'Aaron', 'Jarecki', '69 Yonge Street' , 'Toronto'), " +
		" ( 2, 'Rob', 'Ford', 'City Hall' , 'Toronto'), " +
		" ( 3, 'Elliott', 'Garcea', '69 Yonge Street' , 'Toronto'), " +
		" ( 4, 'Adrian', 'Kemp', '69 Yonge Street' , 'Toronto'); ";

</pre>
<li>Copy the following code into the class. The content provider will handle data from a number of different database tables. These values will allow the ContentProvider to uniquely identify this table. </li>
<pre class="brush: java;">
public static final String URI_PATH = TABLE_NAME;
public static final Uri URI = Uri.parse(PivotalContentProvider.CONTENT + PivotalContentProvider.AUTHORITY + "/" +  TABLE_NAME); 
public static final int CODE = 1;
</pre>
</ol>
<h2 id="Header4">Database Helper</h2>
<ol>
<li>Create a <b>new class</b> in the database package called PivotalDatabase. Make sure the class <b>extends SQLiteOpenHelper</b></li>
<li>Copy the following code into the class. Simple class initialization. We’re also keeping track of the database version. When updating an app already installed on a device, it is vital that app indicate if a new version of the database will be required.</li>
<pre class="brush: java;">
private static final int DATABASE_VERSION = 1;

public PivotalDatabase(Context context, String name) {
	super(context, name, null, DATABASE_VERSION);
}
</pre>
<li>Copy the following code into the class. Notice that this class does not generate any SQL statements itself. Instead, because everything is nicely encapsulated, the Table class provides the SQL statements for it’s own destruction and creation.</li>
<pre class="brush: java;">
@Override
public void onCreate(final SQLiteDatabase db) {
	db.execSQL(PivotalPeopleTable.DROP);
	db.execSQL(PivotalPeopleTable.CREATE);
	db.execSQL(PivotalPeopleTable.DATA_CREATE);
}

@Override
public void onUpgrade(SQLiteDatabase db, int oldVersion, int newVersion) {
	if (oldVersion != newVersion)
		onCreate(db);

}
</pre>
</ol>
<h2 id="Header5">Content Provider</h2>
<p>The Content Provider is Android's way of exposing the database to applications in a simple and abstract manner. Applications will request and manipulate the data inside your database via specifically exposed URIs.</p>
<ol>
	<li>Create a <b>new package</b> ending in providers.</li>
	<li>Create a <b>new class</b> in that package called PivotalContentProvider. Make sure the class <b>extends ContentProvider</b>.</li>
	<li>Copy the following code into the class. Android ContentProviders are uniquely identified by an Authority value. This way many applications can interact with eachother’s ContentProviders, all on the same device, without getting confused. In addition, ContentProviders must be able to indicate the type of content they provide.</li>
<pre class="brush: java;">
private static final String PIVOTAL_DATABASE = "MyDatabase";
private static final String MIME_TYPE = "pivotal";
private static SQLiteDatabase sDatabase;
public static final String AUTHORITY = "pivotal.authority";
public static final String CONTENT = "content://";
public static final String TASK_URI = "taskUri";
</pre>
<li>Copy the following code into the class. The UriMatcher is a tool for managing many database tables. Each table has a unique URI (see the previous section) that the UriMatcher uses as a key to retrieve the table when it is required.</li>
<pre class="brush: java;">
private final UriMatcher mURIMatcher = new UriMatcher(UriMatcher.NO_MATCH);

private String getTableName(final Uri uri) {
	final int match = mURIMatcher.match(uri);
	switch (match) {
	case PivotalPeopleTable.CODE:
		return PivotalPeopleTable.TABLE_NAME;
	}
	return null;
}

@Override
public boolean onCreate() {
	mURIMatcher.addURI(AUTHORITY, PivotalPeopleTable.URI_PATH, PivotalPeopleTable.CODE);
	return true;
}
</pre>
<li>Copy the following code into the class. The ContentProvider will use a single database, containing many tables, to manage data. That database is defined here as a static object.</li>
<pre class="brush: java;">
protected static synchronized SQLiteDatabase getDatabase(final Context context) {
	if (sDatabase == null) {
		final PivotalDatabase database = new PivotalDatabase(context, PIVOTAL_DATABASE);
		sDatabase = database.getWritableDatabase();
	}
	return sDatabase;
}

private SQLiteDatabase getDatabase() {
	return getDatabase(getContext());
}
</pre>
<li>Copy the following code into the class. These are the CRUD methods for the ContentProvider. Notice that the provider doesn’t manage the database itself. Instead it relies on the methods within the database object to form and execute database statements.</li>
<pre class="brush: java;">
@Override
public int delete(Uri uri, String selection, String[] selectionArgs) {
	final int numRowsDeleted = getDatabase().delete(getTableName(uri), selection, selectionArgs);
	return numRowsDeleted;
}

@Override
public String getType(Uri uri) {
	final String dataSetName = getTableName(uri);
	final String type = MIME_TYPE + "/" + AUTHORITY + "." + dataSetName;
	return type.toLowerCase(Locale.getDefault());
}

@Override
public Uri insert(Uri uri, ContentValues values) {
	final long id = getDatabase().insert(getTableName(uri), null, values);
	return ContentUris.withAppendedId(uri, id);
}

@Override
public Cursor query(Uri uri, String[] projection, String selection, String[] selectionArgs, String sortOrder) {
	final Cursor cursor = getDatabase().query(getTableName(uri), projection, selection, selectionArgs, sortOrder, null, null);
	return cursor;
}

@Override
public int update(Uri uri, ContentValues values, String selection, String[] selectionArgs) {
	final int numRowsAffected = getDatabase().update(getTableName(uri), values, selection, selectionArgs);
	return numRowsAffected;
}
</pre>
</ol>
<h2 id="Header6">Add the ContentProvider to Manifest</h2>
<p>As mentioned above Content Providers are used to serve applications, you need to tell your application where its content provider is located. Ensure that your authority matches the one you defined in your ContentProvider.</p>
<ol> 
<li>Copy the following code into the AndroidManifest.xml, between the Application tags.</li>
<pre class="brush: xml;">
<provider
	android:name="pivotal.architecture.providers.PivotalContentProvider"
	android:authorities="pivotal.authority"
	android:exported="false" />
</pre>
<pre class="brush: java;">
</pre>
<pre class="brush: java;">
</pre>
<pre class="brush: java;">
</pre>
<pre class="brush: java;">
</pre>
</ol>
		</div>
	
	<?php echo Facebook::getFacebookRoot();?>
	<?php echo DomManager::getScripts(); ?>
	</body>
</html>

