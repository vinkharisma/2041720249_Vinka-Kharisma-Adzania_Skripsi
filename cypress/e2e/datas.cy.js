describe('PPIC - Data Management', () => {
    it('PPIC can open the data page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')
    })
})

describe('PPIC - Search Data List', () => {
    it('PPIC can search the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('a').contains('Search Data').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('input[name=name]').type('Terpakai')

        cy.get('button').contains('Submit').click()
    })
})

describe('PPIC - CRUD Data List', () => {
    it('PPIC can create a data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('a').contains('Create New Data').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data/create')

        cy.get('input[name=tanggal]').type('2024/12/12')
        cy.get('input[name=name]').type('TERPAKAI')
        cy.get('input[name=stok_awal]').type('100')
        cy.get('input[name=masuk]').type('0')
        cy.get('input[name=keluar]').type('0')
        cy.get('input[name=stok_akhir]').type('100')
        cy.get('input[name=jumlah_stok_palet_baik]').type('100')
        cy.get('input[name=jumlah_stok_palet_rusak]').type('0')

        cy.get('button').contains('Submit').click()

        cy.get(':nth-child(6) > .page-link').click()
    })

    it('PPIC can edit the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get(':nth-child(6) > .page-link').click()

        cy.get('.d-flex > .btn-info').click()

        cy.get("input[name=masuk]").clear();
        cy.get('input[name=masuk]').type('10')
        cy.get("input[name=stok_akhir]").clear();
        cy.get('input[name=stok_akhir]').type('110')
        cy.get("input[name=jumlah_stok_palet_baik]").clear();
        cy.get('input[name=jumlah_stok_palet_baik]').type('110')

        cy.get('button').contains('Submit').click()

        cy.get(':nth-child(6) > .page-link').click()
    })

    it('PPIC can delete the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('superadmin@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get(':nth-child(6) > .page-link').click()

        cy.get('button').contains('Delete').click()
        cy.get('button').contains('OK').click()
    })
})

describe('VP - Data Management', () => {
    it('VP can open the data page', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')
    })
})

describe('VP - Search Data List', () => {
    it('VP can search the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('a').contains('Search Data').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('input[name=name]').type('Terpakai')

        cy.get('button').contains('Submit').click()
    })
})

describe('VP - CRUD Data List', () => {
    it('VP can create a data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get('a').contains('Create New Data').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data/create')

        cy.get('input[name=tanggal]').type('2024/12/12')
        cy.get('input[name=name]').type('TERPAKAI')
        cy.get('input[name=stok_awal]').type('100')
        cy.get('input[name=masuk]').type('0')
        cy.get('input[name=keluar]').type('0')
        cy.get('input[name=stok_akhir]').type('100')
        cy.get('input[name=jumlah_stok_palet_baik]').type('100')
        cy.get('input[name=jumlah_stok_palet_rusak]').type('0')

        cy.get('button').contains('Submit').click()

        cy.get(':nth-child(6) > .page-link').click()
    })

    it('VP can edit the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get(':nth-child(6) > .page-link').click()

        cy.get('.d-flex > .btn-info').click()

        cy.get("input[name=masuk]").clear();
        cy.get('input[name=masuk]').type('10')
        cy.get("input[name=stok_akhir]").clear();
        cy.get('input[name=stok_akhir]').type('110')
        cy.get("input[name=jumlah_stok_palet_baik]").clear();
        cy.get('input[name=jumlah_stok_palet_baik]').type('110')

        cy.get('button').contains('Submit').click()

        cy.get(':nth-child(6) > .page-link').click()
    })

    it('VP can delete the data', () => {
        cy.visit('http://localhost:8000/login')

        cy.get('input[name=email]').type('user@gmail.com')
        cy.get('input[name=password]').type('password')
        cy.get('button').contains('Login').click()
        cy.url().should('contain', 'http://localhost:8000/dashboard')

        cy.get('.form-inline > .navbar-nav > :nth-child(1) > .nav-link').click()
        cy.get('a').contains('Data Management').click()
        cy.get('a').contains('Data List').click()
        cy.url().should('contain', 'http://localhost:8000/data-management/data')

        cy.get(':nth-child(6) > .page-link').click()

        cy.get('button').contains('Delete').click()
        cy.get('button').contains('OK').click()
    })
})
