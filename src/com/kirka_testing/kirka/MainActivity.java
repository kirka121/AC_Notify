package com.kirka_testing.kirka;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.os.Bundle;
import android.provider.Settings.Secure;
import android.util.Log;
import android.view.Menu;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class MainActivity extends Activity {
	private String web_home_url = "http://noty.aws.af.cm/index.php?op=home&id=";
	private WebView webview;
	private static final String TAG = "Main";
	private ProgressDialog progressBar;
	private Context ctx = this;
	final Activity activity = this;
	private String android_id = "";

	/* \/ executed when activity launches for the first time */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.main);
		
		this.webview = (WebView)findViewById(R.id.webview);
		webview.clearCache(true); // for development use only. clearing cache for css styling purposes.
		WebSettings settings = webview.getSettings();
		settings.setJavaScriptEnabled(true);
		webview.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
		
		final AlertDialog alertDialog = new AlertDialog.Builder(this).create();
		progressBar = ProgressDialog.show(MainActivity.this, getString(R.string.progress_dialog_title), getString(R.string.progress_dialog_description));
		
		
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
		webview.loadUrl(web_home_url + android_id);
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

}
