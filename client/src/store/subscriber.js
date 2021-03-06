import store from '@/store'

store.subscribe(mutation => {
  switch (mutation.type) {
    case 'login/SET_TOKEN':
      if (mutation.payload) {
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + mutation.payload
        localStorage.setItem('token', mutation.payload)
      } else {
        axios.defaults.headers.common['Authorization'] = null
        localStorage.removeItem('token')
      }
      break

    case 'login/SET_USER':
      if (mutation.payload) {
        localStorage.setItem('user', JSON.stringify(mutation.payload))
      } else {
        localStorage.removeItem('user')
      }
      break

    case 'login/SET_FINGERPRINT':
      if (mutation.payload) {
        localStorage.setItem('fingerprint', mutation.payload)
        axios.defaults.headers.common['Fingerprint'] = mutation.payload
      } else {
        localStorage.removeItem('fingerprint')
        axios.defaults.headers.common['Fingerprint'] = null
      }
      break

    case 'checkpoint/SET_IS_OTP_VERIFIED_AT_LOGIN':
      if (mutation.payload) {
        localStorage.setItem('isOtpVerifiedAtLogin', mutation.payload)
      } else {
        localStorage.removeItem('isOtpVerifiedAtLogin')
      }
      break
  }
})