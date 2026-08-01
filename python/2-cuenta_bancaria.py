class CuentaBancaria:
    def __init__(self, titular, saldo):
        self.titular = titular
        self.saldo = saldo
    def depositar(self, monto:float):
        if monto >0:
            self.saldo+= monto
            return True
        return False
    def retirar(self, monto:float):
        if 0 < monto <=self.saldo:
            self.saldo -=monto
            return True
        return False
def estadoCuenta(cuenta:CuentaBancaria):
        print(f"el titular de la cuenta {cuenta.titular}")
        print(f"el saldo de la cuenta es {cuenta.saldo}")

cuenta1 = CuentaBancaria("alexander almaguer",100)
cuenta1.depositar(30)
cuenta1.retirar(20)
estadoCuenta(cuenta1)
