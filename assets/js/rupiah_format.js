class rupiahFormat {
	constructor(el) {
		this.el = $(el);
		this.event = 'input';
		this.split;
		this.sisa;
		this.rupiah;
		this.ribuan;
		this.bind();
		this.run();
		this.prefix = '';
	}

	run() {
		const self = this;
		var separator;
		self.el.on(this.event, (event) => {
			self.isNotLetter(event);
			self.bind();
			self.el.val(this.prefix+self.rupiah);
		});
	}

	isNotLetter(event) {
		const self = this;
		if (!self.el.val().match(/[0-9]/)) {
			event.preventDefault();
		}
	}

	bind() {
		var self = this;

		self.numberString = self.el.val().replace(/[^,\d]/g, '').toString();
		self.split = self.numberString.split(',');
		self.sisa = self.split[0].length % 3;
		self.rupiah = self.split[0].substr(0, self.sisa);
		self.ribuan = self.split[0].substr(self.sisa).match(/\d{3}/g);
		let separator;
		if (self.ribuan) {
			separator = self.sisa ? '.' : '';
			self.rupiah += separator + self.ribuan.join('.');
		}

		self.rupiah = self.split[1] != undefined ? self.rupiah + ',' + self.split[1] : self.rupiah;
	}

	getValue() {
		this.el.val(this.rupiah);
		return this;
	}

	setPrefix(val) {
		const self = this;
		self.el.val(val+self.rupiah);
	}

	setEvent(event) {
		this.event = event;
		return this;
	}
}