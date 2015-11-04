import java.io.IOException;
import java.io.InputStream;
import java.net.URL;

import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.eclipse.jetty.server.Server;
import org.eclipse.jetty.servlet.ServletContextHandler;
import org.eclipse.jetty.servlet.ServletHolder;

public class Main extends HttpServlet {

    /**
	 * 
	 */
	private static final long serialVersionUID = -7490600326997334112L;

	@Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp)
            throws ServletException, IOException {
		resp.addHeader("Access-Control-Allow-Origin", "*");
		String URI = req.getRequestURI();
		if(URI.charAt(0) == '/')
			URI = URI.substring(1);
		String query = req.getQueryString();
		if(query != null){
			query = query.trim();
			if(!query.equals("")){
				URI = URI+"?"+query;
			}
		}
        try{
        	System.out.println(URI);
        	URL remote = new URL(URI);
        	InputStream in = remote.openStream();
        	int n;
        	while((n = in.read()) != -1){
        		resp.getWriter().write(n);
        	}
        }catch(Exception ex){
        	resp.setStatus(HttpServletResponse.SC_BAD_REQUEST);
        }
    }

    public static void main(String[] args) throws Exception{
        Server server = new Server(/*Integer.valueOf(System.getenv("PORT"))*/8080);
        ServletContextHandler context = new ServletContextHandler(ServletContextHandler.SESSIONS);
        context.setContextPath("/");
        server.setHandler(context);
        context.addServlet(new ServletHolder(new Main()),"/*");
        server.start();
        server.join();   
    }
}
