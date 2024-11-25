package Ex5;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import HttpServletResponse;
import java.io.IOException;

@WebServlet("/quick-notes")
public class QuickNotesServlet extends HttpServlet {
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        response.setContentType("text/html");
        response.getWriter().println("<h1>Quick Notes Page</h1>");
        response.getWriter().println("<p>Write down your thoughts instantly.</p>");
    }
}
