package com.kirka_testing.kirka;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.provider.Settings.Secure;
import android.util.Log;
import android.view.GestureDetector;
import android.view.GestureDetector.SimpleOnGestureListener;
import android.view.LayoutInflater.Filter;
import android.view.Menu;
import android.view.MotionEvent;
import android.view.View;
import android.view.View.OnClickListener;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class MainActivity extends Activity {
	private WebView webview;
	private static final String TAG = "Main";
	private ProgressDialog progressBar;
	private Context ctx = this;
	final Activity activity = this;
	private String android_id = "";
	private GestureDetector gestureDetector;
	View.OnTouchListener gestureListener;
	private static final int SWIPE_MIN_DISTANCE = 120;
    private static final int SWIPE_MAX_OFF_PATH = 250;
    private static final int SWIPE_THRESHOLD_VELOCITY = 200;
	

	/* \/ executed when activity launches for the first time */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.main);
		
		this.webview = (WebView)findViewById(R.id.webview);
		WebSettings settings = webview.getSettings();
		settings.setJavaScriptEnabled(true);
		webview.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
		//webview.setOnClickListener((OnClickListener) this);
		//webview.setOnTouchListener(gestureListener);
		
		final AlertDialog alertDialog = new AlertDialog.Builder(this).create();
		progressBar = ProgressDialog.show(MainActivity.this, getString(R.string.progress_dialog_title), getString(R.string.progress_dialog_description));
		
		// Gesture detection
        gestureDetector = new GestureDetector(this, new MyGestureDetector());
        gestureListener = new View.OnTouchListener() {
            public boolean onTouch(View v, MotionEvent event) {
                return gestureDetector.onTouchEvent(event);
            }
        };
		
		webview.setWebViewClient(new WebViewClient() {
			public boolean shouldOverrideUtlLoading(WebView view, String url){
				Log.i(TAG, getString(R.string.log_processing_webview));
				view.loadUrl(url);
				return true;
			}
			
			public void onPageFinished(WebView view, String url){
				Log.i(TAG, getString(R.string.log_finished_loading_webview) + url);
				if(progressBar.isShowing()){
					progressBar.dismiss();
				}
			}
			
			public void onReceivedError(WebView view, int errorCode, String description, String failingUrl){
				Log.e(TAG, getString(R.string.log_error) + description);
				Toast.makeText(ctx, "Oh no! " + description, Toast.LENGTH_SHORT).show();
				alertDialog.setTitle("Error");
				alertDialog.setMessage(description);
				alertDialog.setButton("OK", new DialogInterface.OnClickListener() {
                    public void onClick(final DialogInterface dialog, final int which) {
                        return;
                    }
                });
				alertDialog.show();
			}
		});
		android_id = Secure.getString(getBaseContext().getContentResolver(),Secure.ANDROID_ID);
		webview.loadUrl("http://noty.aws.af.cm/index.php?id=" + android_id);
	}
	class MyGestureDetector extends SimpleOnGestureListener {
        @Override
        public boolean onFling(MotionEvent e1, MotionEvent e2, float velocityX, float velocityY) {
            try {
                if (Math.abs(e1.getY() - e2.getY()) > SWIPE_MAX_OFF_PATH)
                    return false;
                // right to left swipe
                if(e1.getX() - e2.getX() > SWIPE_MIN_DISTANCE && Math.abs(velocityX) > SWIPE_THRESHOLD_VELOCITY) {
                	Log.i(TAG, "right to left swipe");
                }  else if (e2.getX() - e1.getX() > SWIPE_MIN_DISTANCE && Math.abs(velocityX) > SWIPE_THRESHOLD_VELOCITY) {
                	Log.i(TAG, "left to right swipe");
                }
            } catch (Exception e) {
                // nothing
            }
            return false;
        }

    }

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

}
