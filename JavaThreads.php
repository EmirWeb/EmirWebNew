<?php
include_once('Utils/DomManager.php');
include_once('Utils/GoogleAnalytics.php');
include_once('Utils/Utilities.php');
include_once('Utils/Facebook.php');
include_once('Utils/Social.php');
include_once('Widgets/Group.php');
include_once('Widgets/NavigationBar.php');
DomManager::addCSS('CSS/Body.css');
DomManager::addCSS('CSS/GoogleTV.css');
DomManager::addCSS('CSS/Social.css');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Strict//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>EmirWeb</title>
<link rel="shortcut icon" href="favicon.ico" />




		<?php echo DomManager::getCSS(); ?>
		<?php echo DomManager::getScripts(); ?>
		<?php echo Facebook::getFacebookArticleHead("Android Tutorial"); ?>
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

			<h2>Java Threads an Inconvenient Truth</h2>
			<ul>
				<li><a href="#Header1">Traditional Unix Threads</a></li>
				<li><a href="#Header2">The Java Model</a></li>
				<li><a href="#Header3">Hoare Monitor Basics</a></li>
				<li><a href="#Header4">This Is Where The MAGIC Happens</a></li>
				<li><a href="#Header5">Deadlock and Lock Acquisition</a></li>
				<li><a href="#Header6">Synchronize All The Methods!</a></li>
				<li><a href="#Header7">Wait/notify and Hoare Monitors</a></li>
				<li><a href="#Header8">So Much Overhead</a></li>
				<li><a href="#Header9">Managing Memory Updates Yourself</a></li>
				<li><a href="#Header10">Android Development</a></li>
				<li><a href="#Header11">Thread Safe Classes</a></li>
				<li><a href="#Header12">Concurrent Classes</a></li>
				<li><a href="#Header13">Immutable Classes</a></li>
				<li><a href="#Header14">Executors</a></li>
				<li><a href="#Header15">Singletons</a></li>
				<li><a href="#Header15">When Will Java Thread Programming Be Safe
						Again?</a></li>
				<li><a href="#Header16">Conclusions and Guidelines</a></li>
				<li><a href="#Header16">Referneces</a></li>
			</ul>
			
			
			<?php echo Facebook::getFacebookComments(Utilities::getCurrentPageURL(), "300", "3")?>
			</div>
		<div class="Essay">
			<h1 id="Title1">Java Threads an Inconvenient Truth</h1>
			<p>
				A good understanding of <a
					href="http://en.wikipedia.org/wiki/Thread_(computing)">multi-threading</a>
				in the traditional unix memory model is required for the following
				tutorial. Also if anything please read <a href="#Header16">Conclusions
					and Guidelines</a> before attempting java programming again.
			</p>
			<h2 id="Header1">Traditional Unix Threads</h2>

			<p>
				With the traditional c model one could <a
					href="http://linux.die.net/man/2/fork">fork()</a>. This would
				create a child and parent, the child would copy the parent's memory
				space and they would communicate through sockets, which were
				essentially files. <a href="http://linux.die.net/man/2/vfork">vfork()</a>
				would allow them to share the same memory space, but one at a time.
				Then there are also <a href="http://linux.die.net/man/3/exec">exec()</a>
				and <a href="http://linux.die.net/man/2/clone">clone()</a> that
				would similarly launch processes and allow for communication between
				them. Communication proved to be very difficult, so eventually <a
					href="http://en.wikipedia.org/wiki/POSIX">POSIX</a> threads came to
				be. With posix threads, along came <a
					href="http://en.wikipedia.org/wiki/Mutual_exclusion">mutex locks</a>
				and <a href="http://en.wikipedia.org/wiki/Semaphore_(programming)">semaphores</a>
				to help with communication (locking). These are all very low end
				principles and take a lot of care and consideration when applying.
			</p>

			<h2 id="Header2">The Java Model</h2>

			<p>
				We all take Java for granted, we launch <a
					href="http://docs.oracle.com/javase/6/docs/api/java/lang/Thread.html">Threads</a>
				and assume that we can use the same memory space, that each Thread
				is created equal and will get fair access to the processor. We
				assume that we can share information between threads via variables,
				use semaphores and mutexs with no regard to memory life. The sad
				truth is that we were misinformed. You may have noticed that there
				are a lot of standard classes like HashMap and Hashtable that seem
				to do the same thing but one is “Thread Safe” and the other is not.
				More importantly, you may have noticed that nobody really explained
				what thread safe meant other than it may cost you more to access
				some of its blocking calls.
			</p>
			<h2 id="Header3">Hoare Monitor Basics</h2>

			<p>
				Java uses a synchronization mechanism called <a
					href="http://en.wikipedia.org/wiki/Monitor_(synchronization)">Hoare
					Monitors</a>. The idea is that handling communication between
				multiple threads is difficult, by this I mean locking and unlocking
				mutex locks. So to simplify this issue, a monitor only allows one
				thread into the critical sections of the code at a time. That means
				that all threads only have one lock to acquire and release. This
				makes it a lot simpler to control the concurrency you are applying.
				A common misconception is that using a Hoare Monitor only allows one
				lock for the entire operating system or application. In Java, each
				object is a monitor and gives access to the critical section (or
				monitor) through the synchronized keyword.
			</p>
			<p>1. Synchronized Function</p>
			<code>
				<pre>
		synchronized int myCriticalSection(){
			// Critical section
			return result;
		}
				</pre>
			</code>
			<p>2. Synchronized Block of Code.</p>
			<code>
				<pre>
		...
			synchronized(someNonPrimitiveObject) {
				// Critical section
			}
		...
				</pre>
			</code>
			<p>What happens when you use #2</p>
			<code>
				<pre>
		// Acquire lock + MAGIC
			// Critical section
		// MAGIC + release lock
				</pre>
			</code>
			<p>
				Note the MAGIC, we will talk about this <a href="#Header4">later</a>.
			</p>
			<p>What happens when you use #1</p>
			<code>
				<pre>
		int myCriticalSection(){
			syncrhonized (this) {
				//Critical section
			}
			return result;
		}
				</pre>
			</code>
			<p>or</p>
			<code>
				<pre>
		int myCriticalSection(){
			// Acquire lock + MAGIC
				// Critical section
			// MAGIC + release lock
			return result;
		}
				</pre>
			</code>
			<h2 id="Header4">This Is Where The MAGIC Happens</h2>

			<p>Most people think they understand this and that it can replaced by
				sleeps, interrupts or Semaphores. Which is not the case. In reality
				the MAGIC is consolidating the memory spaces that the threads and
				monitors operate in. This makes sure that any thread that enters the
				monitor has all of the up to date information from the work of the
				previous threads. If we remove the synchronized keywords, and
				replace it with sleep, notify or a semaphore. The read/writes won't
				necessarily propagate to the other threads.</p>
			<p>I don't think those were words :S ...</p>

			<p>Lets go over a simple example.</p>


			<code>
				<pre>
		class MySexyMonitor{
		
			private String mString;
		
			public synchronized String getSyncedString(){
				return getString();
			}	
		
			public synchronized setSyncedString(String string){
				setString(string);
			}
		
			public String getString(){
				return mString;
			}
		
			public setString(String string){
				mString = string;
			}
		}
				</pre>
			</code>
			<p>Assume that these happen atomically in the following order</p>


			<div class="Table">
				<div class="Row">
					<div class="Cycle Header">
						<h3>Cycle</h3>
					</div>
					<div class="Column Header">
						<h3>Thread1</h3>
					</div>
					<div class="Column Header">
						<h3>Thread2</h3>
					</div>
					<div class="Column Header">
						<h3>Thread3</h3>
					</div>
					<div class="Clear"></div>
				</div>
				<div class="Row">
					<div class="Cycle">1</div>
					<div class="Column">setString(“unSynced”);</div>
					<div class="Column">&nbsp</div>
					<div class="Column">&nbsp</div>
					<div class="Clear"></div>
				</div>
				<div class="Row">
					<div class="Cycle">2</div>
					<div class="Column">&nbsp</div>
					<div class="Column">&nbsp</div>
					<div class="Column">setSyncedString(“Synced”);</div>
					<div class="Clear"></div>
				</div>

				<div class="Row">
					<div class="Cycle">3</div>
					<div class="Column">&nbsp</div>
					<div class="Column">String s1 = getString();</div>
					<div class="Column">&nbsp</div>
					<div class="Clear"></div>
				</div>

				<div class="Row">
					<div class="Cycle">4</div>
					<div class="Column">&nbsp</div>
					<div class="Column">String s2 = getSyncedString();</div>
					<div class="Column">&nbsp</div>
					<div class="Clear"></div>
				</div>

				<div class="Row">
					<div class="Cycle">5</div>
					<div class="Column">String s3 = getString();</div>
					<div class="Column">&nbsp</div>
					<div class="Column">&nbsp</div>
					<div class="Clear"></div>
				</div>
			</div>

			<p>What are the possible values for s1?</p>


			<p>
				s1 = null;<br /> s1 = “unSynced”;<br /> s1 = “Synced”;
			</p>

			<p>All of these are possible for s1, s3 could be either of “unSynced
				or “Synced”, where as we are guaranteed that that s2 will always be
				“Synced”. Thread1 has set the value of mString to “unSynced” in its
				memory space. That memory is dirty, but may never actually get
				copied over to the memory space where Thread2 or Thread3 will see
				the changes.</p>
			<p>
				Synchronized blocks of code create a <a
					href="http://en.wikipedia.org/wiki/Happened-before">happens-before</a>
				relationship. This means that subsequent calls to the critical
				section of a monitor (synchronized blocks) assure that every piece
				of memory a thread touches is available and current when the next
				thread accesses that monitor's critical section. Note the importance
				of the which monitor you are synchronizing on. If two monitors
				synchronize code that touches the same variable, one monitor will
				not necessarily see the changes of the other.
			</p>
			<p>Also it is important to note that in some JVMs, in the example
				above, s2 could be “unSynced”. This is because Thread1 wrote to the
				variable, its memory copy could have been delayed until just after
				Thread3's write. This shows the dangers of having un-synchronized
				code in a multi-threaded environment.</p>
			<h2 id="Header5">Deadlock and Lock Acquisition</h2>
			<p>It is still possible to have deadlock due to the order in which
				you acquire different monitor's locks, so be careful. The
				synchronized keyword is nice because, by design, it forces you to
				release your locks every time you use them, making sure nobody
				forgets to release a lock upon completion of execution. Note monitor
				locks are re-entrant, this means that if you have a lock, you can
				enter critical sections that also require that lock.</p>
			<h2 id="Header6">Synchronize All The Methods!</h2>
			<p>No! There are other ways of ensuring that your memory is up to
				date. The volatile keyword can be set when instantiating member
				variables in a class.</p>
			<code>
				<pre>
		private volatile String mVolatileString;
				</pre>
			</code>
			<p>The volatile keyword will ensure that after every write, the
				memory is updated to all threads. It will not ensure that access to
				that variable is atomic. Certain blogs will claim that access to any
				methods in a volatile object is equivalent to surrounding all of
				that object's methods with a synchronized block. From what I have
				read in Sun's documentation, it only guarantees that all the reads
				and writes are visible to all other threads. The order of the reads
				and writes is respected more and more as the versions of java
				increase, but it is still not necessarily fully respected. Also it
				is important to note that any changes to a volatile object made by a
				thread will create a happens-before relationship with all other
				threads that access that volatile variable (upon access). All the
				memory that was touched by that thread, thread safe or not, will be
				made visible to all other threads. Similar to the relationship of
				the synchronized keyword and its monitor, here the changes we are
				talking about are only guaranteed to be seen by other threads at the
				time that they access the volatile variable.</p>


			<h2 id="Header7">Wait/Notify and Hoare Monitors</h2>

			<p>Hoare Monitors allow threads to wait for a condition inside a
				monitor. To wait a Thread must have the monitor's lock (be inside a
				synchronized block) when the wait occurs. It will then block
				execution until notify() is called (also in a synchronized block).
				Wait and notify are thread safe, but can be dangerous if you fail to
				notify a waiting block. Also when notify is called, the waiting
				thread does not necessarily run right away. It gets thrown into the
				wait queue with any other threads that are waiting to access the
				monitor and must compete for the lock.</p>

			<h2 id="Header8">So Much Overhead</h2>
			<p>Most often I hear “I didn't synchronize that because it would cost
				me too much in overhead”. This is a false assumption. Synchronizing
				and creating happens-before relationships in modern day java is very
				cheap, although in older JVMs it was fairly expensive.</p>


			<h2 id="Header9">Managing Memory Updates Yourself</h2>
			<p>For those of you who believe that synchronized and volatile are
				keywords made up by Java fan boys as a way to diminish the true java
				expert, you are in luck. Another way you can still use sleeps,
				interrupts and Semaphores is to learn to use the join method. The
				join() method creates a happens-before relationship between two
				threads. Although I do not recommend this as your go to
				happens-before relationship creator unless you have very specific
				speed optimization needs that require you to keep track of how much
				time the JVM is wasting keeping track of other happens-before
				relationship creating mechanisms. Also you need to have a very
				specific work flow for threads that would require the rest of
				join()'s functionality.</p>

			<h2 id="Header10">Android Development</h2>

			<p>The nifty thing about Android is the UI thread. Almost every
				thread has to show the results of its work on the UI thread. Every
				time information hits the UI thread, we are guaranteed that it is up
				to date and synchronized. This is what makes AsyncTask's work thread
				safe. Unless you save intermediate results globally in your
				onBackground method.</p>

			<h2 id="Header11">Thread Safe Classes</h2>

			<p>You may have seen that the only difference between certain Classes
				is that one is thread safe and the other is not. Thread safe means
				not only that it is safe for concurrent access in terms of
				appropriate atomicity, but also in terms of making sure that you are
				reading the most up to date information, regardless of which thread
				you are.</p>

			<h2 id="Header12">Concurrent Classes</h2>

			<p>
				Classes such as <a
					href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/ConcurrentHashMap.html">ConcurrentHashMap</a>
				are not only thread safe, but optimized for concurrent access. They
				offer methods such as putIfAbsent(K key, V value). A custom
				implementation would require you to lock around a traditional
				HashMap or Hashtable, check to see if the inserting value is absent,
				put it in and then release the lock. At least double the locks if
				you are using a thread safe Colleciton. Concurrent classes claim to
				be optimized more so than one would be able to do with traditional
				locking of thread safe or non thread safe objects. I highly
				recommend the use of these classes.
			</p>
			
			<p>
				Due to the difficulty of using wait/notify correctly, Java has classes such as
				BlockingQueue allow for functions such as take() which blocks until there is a
				new element in the queue. Also look at <a href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/CountDownLatch.html">CountDownLatch</a>
				, <a href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/Semaphore.html">Semaphores</a>, 
				<a href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/CyclicBarrier.html">CyclicBarrier</a> 
				and <a href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/Exchanger.html">Exchanger</a>. 
			</p>
			
			<p> Note for timing use System.nanoTime instead of System.currentTimeInMillis.

			<h2 id="Header13">Immutable Classes</h2>

			<p>Immutable classes are thread safe because they only get written
				once. To make an immutable class make all your member variables
				private and final. They can only be created in the constructor. When
				changes want to be made to the value of your variable, simply create
				a new variable of that type and return it with the changes desired.
			</p>


			<code>
				<pre>
		Public class myImmutableClass {
			private final String mImmutableString;
			
			public myImmutableClass(String string){
				mImmutableString = string;
			}
		
			public myImmutableClass append(char c){
				return new myImmutableClass(mImmutableString + c);
			}
		}				
				</pre>
			</code>
			<p>This works because constructors define the initial value of the
				object and hence do not require a happens-before relationship.
				Similarly, constructors can not be synchronized and any synchronized
				blocks inside a constructor are without purpose. Note that people
				will complain about the overhead of methods instead of accessing the
				variable directly, but seriously, is your application that sensitive
				that the overhead of a get method will ruin your application?</p>
			<h2 id="Header14">Executors</h2>

			<p>
				Timer tasks and other such thread management mechanisms are no
				longer recommended. They are old and are practically deprecated. Use
				<a
					href="http://docs.oracle.com/javase/6/docs/api/java/util/concurrent/Executors.html">Executors</a>,
				they are thread safe and optimized for efficiency and stability. Do
				not bother launching threads yourself.
			</p>
			<h2 id="Header15">Singletons</h2>

			<p>
				Singleton patterns need have their constructor synchronized as follows
			</p>
			<code>
				<pre>
		public class MySingleton {
			private Object object;
			public static synchronized Object getObject(){
				if (object == null)
					object = new Object();
				return object;
			}
		}
				</pre>
			</code>
			
			<p>Better yet use static and final appropriately to accomplish this at runtime</p>
			<code>
				<pre>
		public class MySingleton {
			private static final Object object = new Object();
			public static Object getObject(){
				return object;
			}
			
		}
				</pre>
			</code>

			<h2 id="Header16">When Will Java Thread Programming Be Safe Again?</h2>
			<p>The time is now. Think carefully about what variables you want to
				use to share information between threads and wrap them around
				synchronized methods or in front of a volatile keyword, depending on
				what kind of work you want to optimize. Remember that your object is
				a monitor, in the case of synchronized static methods, MyClass.class
				is your monitor. Do not share access to member variables ever! Make
				all your member variables private and your models immutable. Only
				use thread wait, notify, interrupt and join if you really know what
				you are doing or if you are not passing information between them via
				memory, other than locking information. Such communication should be
				done through sockets, databases, files or thread safe objects. Use
				object oriented design and design paradigms, member variables should
				only live inside their class, any access to them should be
				controlled through methods.</p>
			<p>
				For concurrency issues, I recommend that you carefully pass lists
				between classes, don't be afraid to return new Arraylist
				<Object>(someOtherList); Most of the time the objects in these lists
					are models and can be made immutable, so you would effectively be
					doing a deep copy. The reason for this arises because return
					someOtherList; gives the caller a direct reference to your object
					and allows them to change the inner workings of your class outside
					of the thread safe environment you may have created. 
			
			</p>
			<h2 id="Header17">Conclusions and Guidelines</h2>
			<p>If you are not sure how your threads behave in memory, identify
				the variables you will be sharing, make them private and use
				synchronized on your read and write methods. This will not make your
				application noticeably slower and ultimately it will be guaranteed
				to be correct. Do not launch Threads by yourself, use Executor
				services. If you want to give member variable access to different
				threads and you don't care what order the threads are writing to it
				(I.E. you don't want to introduce the overhead of synchronization)
				use the volatile keyword. If you are not sure how to use
				synchronized, use Concurrent Classes. These are optimized and thread
				safe. These simple rules will ensure that your programmes are
				correct.</p>
			<h2 id="Header18">References</h2>
			<ul>
				<li>Inside the JAVA 2 Virtual Machine Second Edition, by Bill
					Verners, 1999, McGraw-Hill</li>
				<li>JAVA IN A NUTSHELL A Desktop Quick Reference 5th Edition, by
					David Flanagan, 2005, O'REILLY</li>
				<li><a
					href="http://docs.oracle.com/javase/tutorial/essential/concurrency/">Lesson:
						Concurrency</a>, 2012, Oracle and/or its affiliates</li>

			</ul>


			<p></p>
			<br /> <br /> <br /> <br />
		</div>
	</div>
	
	
	
	
	<?php echo Facebook::getFacebookRoot();?>
	</body>
</html>
