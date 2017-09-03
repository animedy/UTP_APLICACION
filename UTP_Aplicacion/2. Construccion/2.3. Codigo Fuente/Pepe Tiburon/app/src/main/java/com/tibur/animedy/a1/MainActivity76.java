package com.tibur.animedy.a1;

import android.os.Bundle;
import android.support.design.widget.FloatingActionButton;
import android.support.design.widget.Snackbar;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.View;
import android.view.Menu;
import android.view.MenuItem;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;

//Clase principal donde se  inicializa y ejecuta la interfaz (LAYOUT
//Autor Juan Jose Paz Chalco 
//      Ricardo Palacios Arce
//      Carlos Sanchez Aquino
//fecha de creacion 22-08-2017
//fecha modificacion 26-08-2017
public class MainActivity76 extends AppCompatActivity {
// Se inicializa la actividad y se llama al layout principal
// Se llama al navegador WebView que viene por defecto en android
//Autor Juan Jose Paz Chalco 
//      Ricardo Palacios Arce
//      Carlos Sanchez Aquino
//fecha de creacion 22-08-2017
//fecha modificacion 26-08-2017

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main76);

        WebView web= (WebView)findViewById(R.id.webView);
        WebSettings seting=web.getSettings();
        seting.setJavaScriptEnabled(true);
        web.setWebViewClient(new MyWebViewClient());

        web.loadUrl("http://rrapa.esy.es/");
    }
//Se crea la clase de tipo WebViewClient donde se envia el url
// de la pagina y devuelve un valor verdadero si se carga la pagina
//Autor Juan Jose Paz Chalco 
//      Ricardo Palacios Arce
//      Carlos Sanchez Aquino
//fecha de creacion 22-08-2017
//fecha modificacion 26-08-2017

    private class MyWebViewClient extends WebViewClient
    {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view , String url)  {
        view.loadUrl("http://rrapa.esy.es/");
            return true;
        }
    }

}
