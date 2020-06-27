using MySql.Data.MySqlClient;
using System.Data;

namespace CPlaneacion
{
    class MySQLConection
    {
        private MySqlConnection Conexion;

        public MySqlConnection AbrirConexion()
        {
            Conexion = new MySqlConnection("Server=localhost;port=3306;userid=ProsXT;password=root;database=Planeacion_UP");
            if (Conexion.State == ConnectionState.Closed)
            {
                Conexion.Open();
            }
            return Conexion;
        }

        public MySqlConnection CerrarConexion()
        {
            if (Conexion.State == ConnectionState.Open)
            {
                Conexion.Close();
            }
            return Conexion;
        }
    }
}
