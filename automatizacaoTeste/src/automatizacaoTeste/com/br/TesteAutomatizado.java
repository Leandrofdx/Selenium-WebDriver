package automatizacaoTeste.com.br;
import org.junit.After;
import org.junit.Before;
import org.junit.Test;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

public class TesteAutomatizado {
	
	private WebDriver driver = null;
	String nome = "ana";
	String usuario = "anafdx";
	String senha = "123";
	String tipoUsuario = "Usuário";
	String tipoAdminstrador = "Administrador";
	int elemento = 1; 
	
	@Before
	public void inicializar(){
		System.setProperty("webdriver.chrome.driver", "/Users/leandro/Desktop/plugins/chromedriver");
		this.driver = new ChromeDriver();
	}
	
	@Test
	public void fluxo(){
		
		Logar logar = new Logar(driver);
		logar.logarNoSistema();
		
		ManterUsuarios usuarios = new ManterUsuarios(driver);
		usuarios.cadastrar(nome, usuario, senha, tipoAdminstrador);
		usuarios.editar(elemento, tipoUsuario);
		usuarios.excluir(elemento, nome);
	}
	
	@After
	public void finalizar(){
		driver.close();
	}
}
