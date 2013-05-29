package com.kirka_testing.kirka;

import android.app.Activity;
import android.app.AlertDialog;
import android.app.ProgressDialog;
import android.content.Context;
import android.content.DialogInterface;
import android.content.Intent;
import android.net.Uri;
import android.os.Bundle;
import android.util.Log;
import android.view.Menu;
import android.view.Window;
import android.view.WindowManager;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Toast;

public class MainActivity extends Activity {
	private WebView webview;
	private static final String TAG = "Main";
	private ProgressDialog progressBar;
	private Context ctx = this;

	/* \/ executed when activity launches for the first time */
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		
		setContentView(R.layout.main);
		
		this.webview = (WebView)findViewById(R.id.webview);
		WebSettings settings = webview.getSettings();
		settings.setJavaScriptEnabled(true);
		
		webview.setScrollBarStyle(WebView.SCROLLBARS_OUTSIDE_OVERLAY);
		
		final AlertDialog alertDialog = new AlertDialog.Builder(this).create();
		
		progressBar = ProgressDialog.show(MainActivity.this, "Notify", "Is Loading...");
		
		webview.setWebViewClient(new WebViewClient() {
			public boolean shouldOverrideUtlLoading(WebView view, String url){
				Log.i(TAG, "Processing webview url click...");
				view.loadUrl(url);
				return true;
			}
			
			public void onPageFinished(WebView view, String url){
				Log.i(TAG, "Finished loading URL: " +url);
				if(progressBar.isShowing()){
					progressBar.dismiss();
				}
			}
			
			public void onReceivedError(WebView view, int errorCode, String description, String failingUrl){
				Log.e(TAG, "Error: " + description);
				Toast.makeText(ctx, "Oh no! " + description, Toast.LENGTH_SHORT).show();
				alertDialog.setTitle("Error");
				alertDialog.setMessage(description);
				alertDialog.setButton("OK", new DialogInterface.OnClickListener() {
                    public void onClick(DialogInterface dialog, int which) {
                        return;
                    }
                });
				alertDialog.show();
			}
		});
		webview.loadUrl("http://noty.aws.af.cm/index.php?id=1");
	}

	@Override
	public boolean onCreateOptionsMenu(Menu menu) {
		// Inflate the menu; this adds items to the action bar if it is present.
		getMenuInflater().inflate(R.menu.main, menu);
		return true;
	}

}
